<?php

function append($filter, $value)
{
    return "$filter=$value";
}

function checked($current, $checked)
{
    return $current == $checked ? 'checked' : '';
}

function selected($current, $selected)
{
    return $current == $selected ? 'selected' : '';
}
