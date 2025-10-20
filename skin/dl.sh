#!/bin/bash

function _dl {
  if ! test -f $1
  then
    wget "http://www.eyerevolution.co.uk/tours/BigBrother/skin/$1"
  fi
}

_dl product.xml
_dl tag.png 
_dl close.png 
_dl store_link.png
