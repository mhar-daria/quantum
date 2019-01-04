<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;

class SearchViewModel extends ArchiveViewModel
{
    public function title()
    {
        return esc_html__('Search', 'realtyspace');
    }

    public function subtitle()
    {
        return sprintf(esc_html__('Search Results for: %s', 'realtyspace'), get_search_query());
    }

}
