<?php

namespace cf47\themecore\timber;

class TermAdapter
{
    const FQCN = __CLASS__;

    /**
     * @var \TimberTerm
     */
    protected $timberTerm;

    public function __construct($term)
    {
        if ($term instanceof \TimberTerm) {
            $this->timberTerm = $term;
        } else {
            $this->timberTerm = new \TimberTerm($term);
        }
    }

    public function id()
    {
        return $this->timberTerm->id;
    }

    public function description()
    {
        return $this->timberTerm->description();
    }

    public function __toString()
    {
        return (string) $this->name();
    }

    public function name()
    {
        return $this->timberTerm->name;
    }

    public function link(){
        return $this->timberTerm->link();
    }
}
