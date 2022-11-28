<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;

// use App\Http\Controllers\createindex;

class pagegroup extends FPDF
{
    protected $NewPageGroup = false;   // variable indicating whether a new group was requested
    protected $PageGroups = array();   // variable containing the number of pages of the groups
    protected $CurrPageGroup;          // variable containing the alias of the current page group

    protected $CantPageAnterior = 0;

    // create a new page group; call this before calling AddPage()
    function StartPageGroup()
    {
        $this->NewPageGroup = true;
    }

    // current page in the group
    function GroupPageNo()
    {
        return $this->PageGroups[$this->CurrPageGroup];
    }

    // alias of the current page group -- will be replaced by the total number of pages in this group
    function PageGroupAlias()
    {
        return $this->CurrPageGroup;
    }

    function CantPagesAnterior()
    {
        return "{nb$this->n}";
        // return "{nb}";
    }

    function _beginpage($orientation, $size, $rotation)
    {
        parent::_beginpage($orientation, $size, $rotation);
        if($this->NewPageGroup)
        {
            // start a new group
            $n = sizeof($this->PageGroups)+1;
            $alias = "{nb$n}";
            $this->PageGroups[$alias] = 1;
            $this->CurrPageGroup = $alias;
            $this->NewPageGroup = false;
        }
        elseif($this->CurrPageGroup)
            $this->PageGroups[$this->CurrPageGroup]++;
    }

    function _putpages()
    {
        $nb = $this->page;
        if (!empty($this->PageGroups))
        {
            // do page number replacement
            foreach ($this->PageGroups as $k => $v)
            {
                for ($n = 1; $n <= $nb; $n++)
                {
                    $this->pages[$n] = str_replace($k, $v, $this->pages[$n]);
                }
            }
        }
        parent::_putpages();
    }
}

