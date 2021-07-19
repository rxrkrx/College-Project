<?php

function head_tag($title)
{
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.css" rel="stylesheet">
    <style>
        .btn-toggle:hover,
        .btn-toggle:focus,
        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #0d6efd;
        }
    </style>
    <title>'.
        $title.
    '</title>';
}