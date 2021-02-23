<?php

namespace common\widgets\robust;

use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Html;
use yii\bootstrap4\Widget;
use yii\helpers\ArrayHelper;

class Nav extends \yii\bootstrap4\Nav
{
    /**
     * @var string name of a class to use for rendering dropdowns within this widget. Defaults to [[Dropdown]].
     */
    public $dropdownClass = 'common\widgets\robust\MenuContent';

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        /*if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
        Html::addCssClass($this->options, ['widget' => 'nav']);*/

        Html::removeCssClass($this->options, ['widget' => 'nav']);
    }

    /**
     * Renders widget items.
     * @throws InvalidConfigException
     */
    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     * @throws InvalidConfigException
     * @throws \Exception
     */
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = "<span class='menu-title'>" . ($encodeLabel ? Html::encode($item['label']) : $item['label']) . "</span>";

        if (isset($item['icon'])) {
            $icon = "<i class='{$item["icon"]}'></i>";
        } else {
            $icon = "<i class='icon-list'></i>";
        }
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $disabled = ArrayHelper::getValue($item, 'disabled', false);
        $active = $this->isItemActive($item);

        if (empty($items)) {
            $items = '';
        } else {
            /*$linkOptions['data-toggle'] = 'dropdown';
            Html::addCssClass($options, ['widget' => 'dropdown']);
            Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle']);*/
            if (is_array($items)) {
                $items = $this->isChildActive($items, $active);
                $items = $this->renderDropdown($items, $item);
            }
        }

        Html::addCssClass($options, 'nav-item');
        /*Html::addCssClass($linkOptions, 'nav-link');*/

        if ($disabled) {
            ArrayHelper::setValue($linkOptions, 'tabindex', '-1');
            ArrayHelper::setValue($linkOptions, 'aria-disabled', 'true');
            Html::addCssClass($linkOptions, 'disabled');
        } elseif ($this->activateItems && $active) {
            Html::addCssClass($linkOptions, 'active');
        }

        return Html::tag('li', Html::a($icon . $label, $url, $linkOptions) . $items, $options);
    }

    /**
     * Renders the given items as a dropdown.
     * This method is called to create sub-menus.
     * @param array $items the given items. Please refer to [[MenuContent::items]] for the array structure.
     * @param array $parentItem the parent item information. Please refer to [[items]] for the structure of this array.
     * @return string the rendering result.
     * @throws \Exception
     */
    protected function renderDropdown($items, $parentItem)
    {
        /** @var Widget $dropdownClass */
        $dropdownClass = $this->dropdownClass;
        return $dropdownClass::widget([
            'options' => ArrayHelper::getValue($parentItem, 'dropdownOptions', []),
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'clientOptions' => false,
            'view' => $this->getView(),
        ]);
    }

}
