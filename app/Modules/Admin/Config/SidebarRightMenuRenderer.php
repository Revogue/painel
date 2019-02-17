<?php

namespace App\Modules\Admin\Config;

use Konekt\Menu\Contracts\MenuRenderer;
use Konekt\Menu\Item;
use Konekt\Menu\ItemCollection;
use Konekt\Menu\Menu;

class SidebarRightMenuRenderer implements MenuRenderer
{
    public function render(Menu $menu)
    {
        $result = sprintf("<ul%s class=\"nav sidebar-menu\">\n", $menu->attributesAsHtml());
        $result .= $this->renderGroup($menu->items->roots(), 1);
        $result .= "</ul>\n";

        return $result;
    }

    private function renderGroup(ItemCollection $items, int $level)
    {
        $tabs = str_repeat("\t", $level);

        $result = "";

        foreach ($items as $item) {

            if ($item->ismenu) {
                $result .= "$tabs<li class=\"sidebar-label pt20\">$item->title</li>\n";
                if ($item->hasChildren()) {
                    $result .= $this->renderItens($item->children(), $level + 1);
                }
            } else {
                $result .= $this->renderItem($item, $level);
            }
        }

        return $result;
    }

    protected function renderItens(ItemCollection $items, $level)
    {
        $tabs = str_repeat("\t", $level);

        $result = "";

        foreach ($items as $item) {
            $result .= "<li>";

            $result .= $this->createItem($item, $level);

            if ($item->hasChildren()) {
                $result .= $this->renderSubItem($item->children(), $level + 1);
            }

            $result .= "</li>";
        }

        return $result;
    }

    private function renderSubItem(ItemCollection $items, int $level)
    {
        $result = '<ul class="nav sub-nav">';

        foreach ($items as $item) {
            $result .= "<li>";

            $result .= $this->createItem($item, $level);

            if ($item->hasChildren()) {
                $result .= $this->renderSubItem($item->children(), $level + 1);
            }

            $result .= "</li>";
        }

        $result .= "</ul>";

        return $result;
    }

    protected function createItem(Item $item, $level)
    {
        if($item->tray){
            $tray_sub = '<span class="label label-xs %s">%s</span>';
            $tray_sidebar = '<span class="sidebar-title-tray">
                    %s
                </span>';

            $tray_format = $tray_sub;

            if ($level < 3) {
                $tray_format = sprintf($tray_sidebar, $tray_sub);
            }

            $tray = sprintf($tray_format, $item->tray_color ? $item->tray_color : 'bg-primary', $item->tray);
        }

        if($item->hasChildren()){
            $item->link->attr('class', 'accordion-toggle');
            $item->checkActivation();
        }

        return sprintf('<a href="%s"%s>
            <span class="%s"></span>
            <span class="sidebar-title">%s</span>
            %s
            %s
        </a>',
            $item->link->url(),
            $item->link->attributesAsHtml(),
            $item->icon,
            $item->title,
            $item->tray ? $tray : '',
            $item->hasChildren() ? '<span class="caret"></span>' : ''
        );
    }
}
