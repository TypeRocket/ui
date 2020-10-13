<?php
namespace TypeRocket\Template;

use TypeRocket\Http\Request;

class View
{
    protected $data = [];
    protected $title = null;
    protected $ext = null;
    protected $file = null;
    protected $location = null;
    protected $views = null;
    protected $viewsEngine = null;
    protected $context = null;

    /**
     * View constructor.
     *
     * Take a custom file location or dot notation of view location.
     *
     * @param string $dots dot syntax or specific file path
     * @param array $data
     * @param string $ext file extension
     * @param null|string $path
     */
    public function __construct( $dots , array $data = [], $ext = '.php', $path = null )
    {
        if( file_exists( $dots ) ) {
            $this->file = $dots;
        } else {
            $this->ext = $ext;
            $this->location = str_replace('.', '/', $dots) . $ext;
        }

        if( !empty( $data ) ) {
            $this->data = $data;
        }

        $this->views = $path ?? $this->views ?? tr_config('paths.views');
    }

    /**
     * Get the file
     *
     * @return null|string
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Get the Location
     *
     * @return null|string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the data attached to a view.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get file extension
     *
     * @return string|null
     */
    public function getExtension()
    {
        return $this->ext;
    }

    /**
     * Set the title attached to a view.
     *
     * Requires https://codex.wordpress.org/Title_Tag support AND
     * override SEO Meta when used on a template.
     *
     * @param string $title
     *
     * @return \TypeRocket\Template\View
     */
    public function setTitle( $title )
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the title attached to a view.
     *
     * @return array
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set SEO Meta Data
     *
     * Requires SEO plugin
     *
     * @param array $meta
     * @param null|string $url URL for the current page
     *
     * @return View
     * @throws \Exception
     */
    public function setSeoMeta(array $meta, $url = null)
    {
        if(!defined('TR_SEO_EXTENSION')) {
            throw new \Exception('TypeRocket SEO Extension required for the `setMeta()` view method.');
        }

        add_filter('tr_seo_meta', function($old_meta) use ($meta) {
            return $meta;
        });

        add_filter('tr_seo_url', function($old_url) use ($url) {
            return $url ?? (new Request)->getUriFull();
        });

        return $this;
    }

    /**
     * Set Templating Engine
     *
     * @param $engine_class
     *
     * @return View
     */
    public function setEngine($engine_class)
    {
        return $this->setViewsEngine($engine_class);
    }

    /**
     * Set Views Templating Engine
     *
     * @param $engine_class
     *
     * @return View
     */
    public function setViewsEngine($engine_class)
    {
        $this->viewsEngine = $engine_class;

        return $this;
    }

    /**
     * Load Other Context
     *
     * @param null $context
     */
    protected function load($context)
    {
        $view_title = $this->getTitle();

        if($view_title) {
            add_filter('document_title_parts', function( $title ) use ($view_title) {
                if( is_string($view_title) ) {
                    $title = [];
                    $title['title'] = $view_title;
                } elseif ( is_array($view_title) ) {
                    $title = $view_title;
                }
                return $title;
            }, 101);
        }

        $location = $this->getFile() ?? tr_config('paths.' . $context) . '/' . $this->getLocation();
        $templateEngine = $this->viewsEngine ?? tr_config('app.templates.' . $context) ?? tr_config('app.templates.views');
        (new $templateEngine($location, $this->getData(), $context, $this))->load();
    }

    /**
     * Render View
     *
     * @param string|null $context the views context to use
     */
    public function render($context = null)
    {
        $context = $type ?? $this->getContext() ?? 'views';

        $this->load($context);
    }

    /**
     * @param string $context
     *
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $key
     * @param int $time cache forever by default
     *
     * @return string|null
     */
    public function cache($key, $time = 9999999999)
    {
        return tr_cache()->getOtherwisePut($key, function() {
            return $this->toString();
        }, $time);
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return false|string
     */
    public function toString()
    {
        ob_start();
        $this->render();
        return ob_get_clean();
    }

}