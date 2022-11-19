<?php

namespace gn\htmlbuilder;

class htmlbuilder
{
    /**
     * Starts the full split tag for large page termination. Don't forget to end the tag endSplitFullTag();
     * @param string $tag
     * @param array $attributes
     * @return string
     */
    public function startSplitFullTag(string $tag, array $attributes = array()): string
    {
        return "<$tag " . $this->htmlAttributes($attributes) . ">";
    }

    /**
     * Returns a html attributes string based on the given array.
     * Support arguments with just value, like checked for example.
     *
     * Also, if an argument value is null, it is omitted;
     * this behaviour might be useful in this case where we define default attributes values,
     * then the client can unset them by setting a null value.
     *
     *
     * The $keyPrefix allows us to prefix with "data-" for instance.
     *
     */
    public function htmlAttributes(array $attributes, $keyPrefix = "")
    {
        $s = '';
        foreach ($attributes as $k => $v) {
            if (is_numeric($k)) {
                $s .= ' ';
                $s .= htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
            } else {
                if (null !== $v) {
                    $s .= ' ';
                    $s .= $keyPrefix . htmlspecialchars($k, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars($v, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
        }
        return $s;
    }

    /**
     * to use this method tart with startSplitFullTag(); this just terminates what gets opened by that.
     * @param string $tag
     * @return string
     */
    public function endSplitFullTag(string $tag): string
    {
        return "</$tag>";
    }

    /**
     * builds inline css reference
     * @param string $src
     * @return string
     */
    public function css(string $src): string
    {
        return $this->minimizedTag("style", array('src' => $src));
    }

    /**
     * returns a html string from the provided parameters <input />
     * @param $tag string the name of the html tag for instance "input"
     * @param $attributes array list of attribute for the html element
     * @return string to be rendered in the routing engine
     */
    public function minimizedTag(string $tag, array $attributes = array()): string
    {
        return "<$tag " . $this->htmlAttributes($attributes) . " />";
    }

    /**
     * builds inline js reference
     * @param string $src
     * @return string
     */
    public function js(string $src): string
    {
        return $this->minimizedTag("script", array('src' => $src));
    }

    /**
     * builds basic css code block
     * @param string $css
     * @return string
     */
    public function cssBlock(string $css): string
    {
        return $this->tag("style", $css);
    }

    /**
     * full html tag <input></input> that will automatically be cleaned up and escaped
     * @param $tag
     * @param $contents
     * @param $attributes
     * @return string
     */
    public function tag(string $tag, string $contents, array $attributes = array()): string
    {
        return "<$tag " . $this->htmlAttributes($attributes) . ">$contents</$tag>";
    }

    /**
     * builds basic javascript code block
     * @param string $js
     * @return string
     */
    public function jsBlock(string $js): string
    {
        return $this->tag("script", $js);
    }

}