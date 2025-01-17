<div class="FrontLayoutMainMenu">
    <div class="FrontLayoutMainMenuButton" id="header_main_menu_toggler">
        <svg><use xlink:href="#global_menu" /></svg>
    </div>
</div>
<div class="FrontLayoutMainMenuItemsWrapper" id="header_main_menu_body_view">
    <div class="FrontLayoutMainMenuOpenHeader">
        <div class="FrontLayoutMainMenuOpenHeaderContent">
            <div class="FrontLayoutMainMenuOpenHeaderContentItem MainMenuCloseButton">
                <svg><use xlink:href="#global_cross" /></svg>
            </div>
            <div class="FrontLayoutMainMenuOpenHeaderContentItem MainMenuHeaderLogo">
                <svg><use xlink:href="#common_logo" /></svg>
            </div>
            <div class="FrontLayoutMainMenuOpenHeaderContentItem fronLayoutAccountIconsWrapper">
                <div class="FrontLayoutAccountIconButtonButton">
                    <svg><use xlink:href="#global_search"></use></svg>
                </div>
                <div class="FrontLayoutMainMenuOpenHeaderContentItem FrontLayoutAccountIconButtonButton">
                    <svg><use xlink:href="#global_account"></use></svg>
                </div>
                <div class="FrontLayoutMainMenuOpenHeaderContentItem FrontLayoutAccountIconButtonButton">
                    <svg><use xlink:href="#global_cart"></use></svg>
                    <div class="FrontLayoutFilledCartMarker"><div class="FrontLayoutFilledCartMarkerInner">1</div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="FrontLayoutMainMenuItems">
        {foreach $menu_nodes as $menu_node}
            {if $menu_node->visible}
                <div class="FrontLayoutMainMenuItem">
                    {if $menu_node->is_catalog_tree}
                        <div class="FrontLayoutMainMenuItemHeader">{$menu_node->name}</div>
                        <div class="FrontLayoutMainMenuItemBody">    
                            {foreach $menu_node->get_catalog()->childs as $node}
                                {if $node->visible}
                                    {if $node->has_visible_childs}
                                        <div class="FrontLayoutMainMenuItemL2 MainMenuItemL2Childable MainMenuItemL2opened">
                                            <div class="MainMenuItemL2Header">{$node->name}
                                                <div class="MainMenuItemL2HeaderOpenIndicator">
                                                    <svg><use xlink:href="#global_arrow_chevron" /></svg>                                                    
                                                </div>
                                            </div>
                                            <div class="MainMenuItemL2BodyItems">
                                                {foreach $node->childs as $child_node}
                                                    <div class="FrontLayoutMainMenuItemL3">
                                                        <a href="/catalog/{$child_node->alias}">{$child_node->name}</a>
                                                    </div>
                                                {/foreach}
                                            </div>
                                        </div>
                                    {else}
                                        <div class="FrontLayoutMainMenuItemL2">
                                            <a href="/catalog/{$node->alias}">{$node->name}</a>
                                        </div>
                                    {/if}
                                {/if}
                            {/foreach}
                        </div>
                    {else}        
                        <div class="FrontLayoutMainMenuItemHeader">
                            {if $menu_node->url_ok}<a href="{$menu_node->url}">{/if}{$menu_node->name}{if $menu_node->url_ok}</a>{/if}
                        </div>
                        {if $menu_node->has_childs}
                            <div class="FrontLayoutMainMenuItemBody">                            
                                {foreach $menu_node->childs as $node}
                                    {if $node->visible && $node->url_ok}
                                        <div class="FrontLayoutMainMenuItemL2">
                                            <a href="{$node->url}">{$node->name}</a>
                                        </div>
                                    {/if}
                                {/foreach}                            
                            </div>
                        {/if}
                    {/if}
                </div> 
            {/if}
        {/foreach}
    </div>
</div>