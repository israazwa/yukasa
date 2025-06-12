<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public array $templates = [
        'default_full' => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head' => 'CodeIgniter\Pager\Views\default_head',
        'bootstrap' => [
            'pagination_open' => '<nav aria-label="Page navigation"><ul class="pagination">',
            'pagination_close' => '</ul></nav>',
            'active' => '<li class="page-item active"><a class="page-link" href="{uri}">{text}</a></li>',
            'inactive' => '<li class="page-item"><a class="page-link" href="{uri}">{text}</a></li>',
            'next' => '<li class="page-item {class}"><a class="page-link" href="{uri}">Next</a></li>',
            'previous' => '<li class="page-item {class}"><a class="page-link" href="{uri}">Previous</a></li>',
            'disabled' => '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">{text}</a></li>',
        ],
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 20;
    /**
     * --------------------------------------------------------------------------
     * Page Query Parameter
     * --------------------------------------------------------------------------
     *
     * The name of the query parameter used to determine which page is being
     * requested. Defaults to 'page'.
     */

}
