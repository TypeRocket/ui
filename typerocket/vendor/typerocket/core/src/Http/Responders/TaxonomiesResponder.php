<?php
namespace TypeRocket\Http\Responders;

use TypeRocket\Controllers\WPTermController;
use TypeRocket\Http\Request;
use TypeRocket\Register\Registry;
use TypeRocket\Utility\Str;

class TaxonomiesResponder extends Responder
{

    protected $taxonomy = null;

    /**
     * Respond to posts hook
     *
     * Detect the post types registered resource and run the Kernel
     * against that resource.
     *
     * @param array $args
     *
     * @throws \Exception
     */
    public function respond( $args )
    {
        $registered = Registry::getTaxonomyResource($this->taxonomy);
        $controller = null;

        if($singular = $registered['singular'] ?? null) {
            $prefix = Str::camelize( $singular );
            $controller = $registered['controller'] ?? tr_app_class("Controllers\\{$prefix}Controller");
        }

        $controller  = apply_filters('tr_taxonomies_responder_controller', $controller);

        $resource = $registered['singular'] ?? 'category';
        $response = tr_response()->blockFlash();
        $middlewareGroup = [$resource, 'term'];

        if (! class_exists( $controller ) ) {
            $controller = WPTermController::class;
        }

        $this->handler
            ->setArgs($args)
            ->setController([new $controller, 'update'])
            ->setMiddlewareGroups($middlewareGroup);

        $this->runKernel(new Request, $response, $this->handler);
    }

    /**
     * Taxonomy
     *
     * @param string $taxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

}