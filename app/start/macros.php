<?php

HTML::macro('navItem', function ($title, $url, $activeSubUrls = false) {
    if (Request::url() === $url || ($activeSubUrls && starts_with(Request::url(), $url))) {
        $class = ' class="active"';
    } else {
        $class = '';
    }
    return "<li$class><a href='$url'>$title</a></li>";
});

Form::macro('checkboxes', function ($name, $label, $items, $selected = []) {
    $html = "<fieldset><legend>$label</legend>";
    foreach ($items as $value => $label) {
        $id = str_replace(['[]', '[', ']'], '_', $name) . $value;

        $checked = in_array($value, $selected) ? true : null; // So that we can set through session as well
        $input = Form::checkbox($name, $value, $checked, ['id' => $id]);

        $html .= '<div class="form-group">';
        $html .= "<label for='$id'>$input $label</label>";
        $html .= '</div>';
    }
    $html .= '</fieldset>';
    return $html;
});