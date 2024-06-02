<?php
namespace datatables;

class Datatables {
    
    const REQUEST_GET = 'GET';
    const REQUEST_POST = 'POST';
	
    protected $schema;
    protected $callbacks = array();
    protected $plugins = array();
    protected $config = array();
    protected $chain = array();
    protected $params = array(
        'bProcessing'       => true,
        'bServerSide'       => true,
        'sAjaxSource'       => null,
        'bPaginate'         => true,
        'sPaginationType'   => 'full_numbers',
        'bLengthChange'     => true,
        'bFilter'           => true,
        'bSort'             => true,
        'bInfo'             => false,
        'bAutoWidth'        => false,
        'bStateSave'        => false,
        'aLengthMenu'       => array(5, 10, 20, 50, 100, 500, 'All'),
        'aaSorting'         => array(array(1, 'desc')),
        'sScrollY'          => '400px',
        'sScrollX'          => '100%',
        'sScrollXInner'     => '100%',
        'bScrollCollapse'   => false,
        'bScrollInfinite'   => false,
        'bJQueryUI'         => true,
        'iDisplayLength'    => 20,
        'oLanguage'         => array(),
        // 'fnDrawCallback' => ''
    );
    
    protected $htmlTemplate = "
        <table id=\"{:container_id}\">
            <thead>
                <tr>
                    {:headers}
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    {:footers}
                </tr>
            </tfoot>
        </table>
    ";
    
    protected $jsTemplate = "
        <script type=\"text/javascript\">
            <!-- // <![CDATA[
            var {:var_name} = jQuery('#{:container_id}').dataTable({:config}){:chain};
            // ]]> -->
        </script>
    ";
	
    /* ______________________________________________________________________ */
    
	public function __construct(array $config = array()) {
		$defaults = array(
			'request_method'	=> self::REQUEST_GET,
			'data_source'		=> null,
			'var_name'			=> 'oTable',
			'container_id'		=> 'datatableTable'
		);
		$this->config = $config + $defaults;
	}
	
    /* ______________________________________________________________________ */
    
	public function __toString() {
        $table = '';
        try {
            $table = (string) $this->render();
        } catch(\Exception $e) {
            $table = 'Could not render table, possibly caused by wrong configuration';
            $table = $e->getMessage();
        }
		return $table;
	}
	
    /* ______________________________________________________________________ */
    
	public function setConfig($name, $value) {
		return $this->config[$name] = $value;
	}
	
    /* ______________________________________________________________________ */
    
	public function unsetConfig($name) {
		unset($this->config[$name]);
	}
	
    /* ______________________________________________________________________ */
    
	public function getConfig($name) {
		return (isset($this->config[$name])) ? $this->config[$name] : null;
	}
	
    /* ______________________________________________________________________ */
    
	public function setParam($name, $value = '') {
        if($name == 'fnDrawCallback') {
            $this->params['fnDrawCallback'] = '{:callback}';
            return $this->callbacks[] = $value;
        }
		return $this->params[$name] = $value;
	}
	
    /* ______________________________________________________________________ */
    
	public function unsetParam($name) {
        if($name == 'fnDrawCallback') {
            $this->callbacks = array();
        }
		unset($this->params[$name]);
	}
	
    /* ______________________________________________________________________ */
    
	public function getParam($name) {
        if($name == 'fnDrawCallback') {
            return $this->callbacks;
        }
		return (isset($this->params[$name])) ? $this->params[$name] : null;
	}
	
    /* ______________________________________________________________________ */
    
    public function translate($key, $str) {
        $this->params['oLanguage'][$key] = $str;
    }
    
    /* ______________________________________________________________________ */
    
    public function setTranslationArray(array $t) {
        $this->params['oLanguage'] = $t;
    }
    
    /* ______________________________________________________________________ */
    
	public function plug(PluginInterface $plugin) {
		$plugin->apply($this);
	}
	
    /* ______________________________________________________________________ */
    
	public function chain($chain) {
        $chain = rtrim($chain, ';'); // removes semicolon at the end
        $this->chain[] = "{$chain}{:chain}";
    }
	
    /* ______________________________________________________________________ */
    
	public function callback($callback) {
        $this->callbacks[] = $callback;
        $this->params['fnDrawCallback'] = '{:callback}';
    }
	
    /* ______________________________________________________________________ */
    
    public function setSchema(Schema $schema) {
        $this->schema = $schema;
    }
    
    /* ______________________________________________________________________ */
    
    public function getSchema() {
        if( ! ($this->schema instanceof Schema)) {
            throw new \RuntimeException("Datatables schema is not set.");
        }
        return $this->schema;
    }
    
    /* ______________________________________________________________________ */
    
	public function formatJsonOutput(array $data, $totalRecords = null) {
        if(is_null($totalRecords)) {
            $totalRecords = count($data);
        }
        $data = array(
			'iTotalRecords'			=> $totalRecords,
			'iTotalDisplayRecords'	=> $totalRecords,
			'aaData'				=> $data
		);
        return json_encode($data);
    }
	
    /* ______________________________________________________________________ */
    
	public function render() {
        if($this->getParam('bServerSide') == true) {
            if( ! $this->getParam('sAjaxSource')) {
                 if( ! $this->getConfig('data_source')) {
                    throw new \RuntimeException('Data source is not set.');
                 }
                 $this->setParam('sAjaxSource', $this->getConfig('data_source'));
            }
        } else {
            if( ! $this->getParam('aaData')) {
                $this->setParam('aaData', array());
                 // throw new \RuntimeException('Datatables: `aaData` is not set.');
            }
        }
		
        if( ! ($this->schema instanceof Schema)) {
            throw new \RuntimeException("Datatables schema is not set.");
        }
        
		$var_name = $this->config['var_name'];
        $container_id = $this->config['container_id'];
        $chain = empty($this->chain) ? null : '.' . implode('.', $this->chain);
        $callback = "function(oSettings) {\n" . implode("\n", $this->callbacks) . "}\n";
        
		$cols = array();
		$headers = '';
		$footers = '';
		foreach($this->schema->data() as $key => $config) {
			$cols[] = $config['aoColumns'] + array(
				'sName'		=> $key,
				'sTitle'	=> $config['label'],
				'sWidth'	=> $config['width'] ? intval($config['width']) . 'px' : '',
				'bSortable'	=> (bool) $config['sortable'],
				'bVisible'	=> (bool) $config['visible']
			);
            
            // display header label
            $headers .= "<th>{$config['label']}</th>\n";
            
            $footer = '';
            if($config['footer']) {
                $footer = self::insert($config['footer'], $config);
            }
            $footers .= "<th>{$footer}</th>\n";
		}
		$this->params['aoColumns'] = $cols;
		
        // convert 'oLanguage' to object
        $this->params['oLanguage'] = (object) $this->params['oLanguage'];
        
		$config = json_encode($this->params);
        $config = preg_replace('/"\{:callback\}"/', $callback, $config);
		//$config = preg_replace('/"\{:callback\}"/', '{:callback}', $config);
        
        $params = compact('var_name', 'container_id', 'chain', 'callback', 'config', 'headers', 'footers');
        return self::insert($this->htmlTemplate . $this->jsTemplate, $params);
	}
	
	public static function insert($str, array $data) {
        if (empty($data)) {
            return $str;
        }
        
        $replace = array();
        foreach ($data as $key => $value) {
            $replace['{:' . $key . '}'] = $value;
        }
        return strtr($str, $replace);
    }
}