<?php

use App\Models\Page;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Section;
use App\Models\Team;

function omarTest()
{
    return 'iiiii';
}
function loadSection(Section $section)
{
    if ($section->type == 'three_column') {
        $secdata =  loadcolsSection($section);
    } elseif ($section->type == 'select_product') {
        $secdata =  loadselectProdSection($section);
    } elseif ($section->type == 'background_image') {
        $secdata =  loadBackgroundContent($section);
    } elseif ($section->type == 'box_image_test') {
        $secdata =  '';
        if ($section->image_position == 'Right') {
            $secdata =  loadImageTextContentImageRight($section);
        } else {
            $secdata =  loadImageTextContentImageLeft($section);
        }
    } elseif ($section->type == 'team') {
        $secdata =  loadTeamSectionContent($section);
    } else {
        $secdata =  loadContent($section);
    }
    return $secdata;
}
function loadselectProdSection(Section $section)
{
    $data = '<div id="basic" class="section is-medium">';
    $data .= '<div class="container">';
    $data .= '<div class="section-title-wrapper">';
    $data .= '<h2 class="title section-title has-text-centered dark-text text-bold" style="color: black !important;">' . $section->title . '</h2>';
    $data .= '<div class="has-text-centered" style="color:#7C7C7C;font-size:24px;" > ' . $section->description . '</div>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '<div class="content-wrapper">';
    $data .= '<div class="columns is-vcentered">';
    $data .= '<div class="column">';
    $data .= '<div class="image-carousel" style="max-width: 1216px">';
    foreach (Product::Active()->get() as $product) {

        $data .= '<a href="' . route('product_details', ['product' => $product->id]) . '">';
        $data .= '<div class="carousel-item">';
        $data .= '<div class="image-wrapper">';
        $data .= '<img src="' . asset('storage/' . $product->image) . '" data-demo-src="' . asset('storage/' . $product->image) . '" />';
        $data .= '</div>';
        $data .= '<div>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</a>';
    }
    $data .= '</div>';
    $data .= '<div class="has-text-centered mt-60">';
    $data .= '<a href="' . route('page', ['page' => 'products']) . '" class="button button-cta primary-btn rounded slide_link"> ' . __('front.SeeMore') . ' </a>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</div>';

    return $data;
}
function loadcolsSection(Section $section)
{
    $data = '';
    $data .= '<div id="services" class="section is-medium">';
    $data .= '<div class="container">';
    $data .= '<div class="section-title-wrapper has-text-centered">';
    $data .= '<h2 class="section-title-landing">' . $section->title . '</h2> </div>';

    $data .= '<div class="content-wrapper"> <div class="columns is-vcentered is-multiline has-text-centered">';

    $data .= '<div class="column is-4"> <div class="wavy-icon-box">';
    $data .= '<div class="is-icon-reveal"><i class="' . $section->col_icon_1 . '"></i></div>';
    $data .= '<p class="box-content is-tablet-padded">' . $section->col_1 . '</p>';
    $data .= '</div> </div>';

    $data .= '<div class="column is-4"> <div class="wavy-icon-box">';
    $data .= '<div class="is-icon-reveal"><i class="' . $section->col_icon_2 . '"></i></div>';
    $data .= '<p class="box-content is-tablet-padded">' . $section->col_2 . '</p>';
    $data .= '</div> </div>';

    $data .= '<div class="column is-4"> <div class="wavy-icon-box">';
    $data .= '<div class="is-icon-reveal"><i class="' . $section->col_icon_3 . '"></i></div>';
    $data .= '<p class="box-content is-tablet-padded">' . $section->col_3 . '</p>';
    $data .= '</div> </div>';
    $data .= '</div>';
    $data .= '<div class="has-text-centered pt-40 pb-40"> <a href="' . route('page', ['page' => 'about-us']) . '" class="button button-cta primary-btn rounded raised"> ' . __('front.learnmore') . '</a> </div>';
    $data .= ' </div>';
    $data .= ' </div>';
    $data .= ' </div>';
    return $data;
}
function loadContent(Section $section)
{
    $data = '';
    $data .= ' <div class="section contentsec">';
    $data .= '<div class="container">';
    $data .= '<div class="page_section">';
    $data .= '<h2 class="text-uppercase contentsectitle">' . $section->title . '</h2>';
    $data .= $section->description;


    $data .= ' </div>';
    $data .= ' </div>';
    $data .= ' </div>';

    return $data;
}
function loadTeamSectionContent(Section $section)
{
    $teams = Team::get();
    $data = '';
    $data .= ' <div class="section contentsec">';
    $data .= '<div class="container">';
    $data .= '<div class="page_section">';
    $data .= '<p style="font-size: 14px;font-weight: 700;text-transform: capitalize;color: #B1D31A;">team</p>';
    $data .= '<h2 class="text-uppercase " style="font-size: 40px;font-weight: 700;text-transform: capitalize;text-align: start;color: #1C2536;">' . $section->title . '</h2>';
    $data .= $section->description;
    $data .= '<div class="content-wrapper">';
    $data .= '<div class="columns is-vcentered is-multiline has-text-centered">';
    foreach ($teams as $team) {
        $data .= '<div class="column is-3">';
        $data .= '<div class="team_card">';
        $data .= '<div class="img">';
        $data .= '<img src="' . asset('storage/' . $team->image) . '" />';
        $data .= ' </div>';
        $data .= '<div class="data">';
        $data .= '<p class="teams_name">' . $team->name . '</p>';
        $data .= '<p class="teams_job">' . $team->job_title . '</p>';
        $data .= '<div class="social_icons">';


        if ($team->facebook_url) {
            $data .= '<a href="' . $team->facebook_url . '" class="level-item"> <span class="icon"><i class="fa fa-facebook"></i></span> </a>';
        }
        if ($team->instagram_url) {
            $data .= '<a href="' . $team->instagram_url . '" class="level-item"> <span class="icon"><i class="fa fa-instagram"></i></span> </a>';
        }
        if ($team->linkedin_url) {
            $data .= '<a href="' . $team->linkedin_url . '" class="level-item"> <span class="icon"><i class="fa fa-linkedin"></i></span> </a>';
        }
        if ($team->twitter_url) {
            $data .= '<a href="' . $team->twitter_url . '" class="level-item"> <span class="icon"><i class="fa fa-twitter"></i></span> </a>';
        }




        $data .= ' </div>';

        $data .= ' </div>';

        $data .= ' </div>';
        $data .= ' </div>';
    }
    $data .= ' </div>';
    $data .= ' </div>';

    $data .= ' </div>';
    $data .= ' </div>';
    $data .= ' </div>';

    return $data;
}
function loadImageTextContentImageLeft(Section $section)
{
    $data = '';
    $data .= '<div id="services" class="section is-medium">';
    $data .= '<div class="container">';


    $data .= '<div class="content-wrapper"> <div class="columns is-vcentered is-multiline has-text-centered">';



    $data .= '<div class="column is-8"> <div class="wavy-icon-box">';
    $data .= '<h2 class="section-title-landing" style="text-align: start;font-size: 36px;font-weight: 500;margin-bottom: 20px;">' . $section->title . '</h2>';
    $data .= '<div class="box-content is-tablet-padded" style="text-align: start;font-size: 18px;">' . $section->description . '</div>';
    $data .= '</div> </div>';

    $data .= '<div class="column is-4" style="padding:20px"> <div class="wavy-icon-box">';
    $data .= '<img src="' . asset('storage/' . $section->background) . '"/>';
    $data .= '</div> </div>';

    $data .= '</div>';
    $data .= ' </div>';
    $data .= ' </div>';
    $data .= ' </div>';
    return $data;
}
function loadImageTextContentImageRight(Section $section)
{
    $data = '';
    $data .= '<div id="services" class="section is-medium">';
    $data .= '<div class="container">';


    $data .= '<div class="content-wrapper"> <div class="columns is-vcentered is-multiline has-text-centered">';

    $data .= '<div class="column is-4" style="padding:20px"> <div class="wavy-icon-box">';
    $data .= '<img src="' . asset('storage/' . $section->background) . '"/>';
    $data .= '</div> </div>';

    $data .= '<div class="column is-8"> <div class="wavy-icon-box">';
    $data .= '<h2 class="section-title-landing" style="text-align: start;font-size: 36px;font-weight: 500;margin-bottom: 20px;">' . $section->title . '</h2>';
    $data .= '<div class="box-content is-tablet-padded" style="text-align: start;font-size: 18px;">' . $section->description . '</div>';
    $data .= '</div> </div>';
    $data .= '</div>';
    $data .= ' </div>';
    $data .= ' </div>';
    $data .= ' </div>';
    return $data;
}
function loadBackgroundContent(Section $section)
{
    $data = '';
    $data .= '<div class="section is-medium backsection"  
    style="background-image: url(\'' . asset('storage/' . $section->background) . '\');">';
    $data .= '<div class="container">';
    $data .= '<div class="section-title-wrapper">';
    $data .= '<h2 class="title section-title has-text-centered light-text text-bold">  ' . $section->title . '</h2>';
    $data .= '</div>';
    $data .= '<div class="content-wrapper">';
    $data .= '<div class="columns is-vcentered has-text-centered secdescription" style="color: white;">  ' . $section->description . '</div>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= ' </div>';
    return $data;
}

function footerWidget1()
{
    $data = '';
    $data .= '<div class="column is-3">';
    $data .= '<div class="pt-10 pb-10">';
    $data .= '<div class="footer-img">';
    $data .= '<img class="small-footer-logo"  src="' . asset('storage/' . config('settings.footer_logo')) . '" alt="">';
    $data .= '</div>';
    $data .= '<div class="footer-description">' . config('settings.about') . ' </div>';
    $data .= '</div>';
    $data .= '<div>';
    $data .= '</div>';
    $data .= '</div>';
    return $data;
}
function footerWidget2()
{
    $pages = Page::MainPages()->Active()->WithoutHome()->orderBy('order')->get();
    $product_categories = Product_categories::Active()->limit(4)->get();

    $data = '';
    $data .= '<div class="column is-5 is-offset-1">';
    $data .= '<div style="display:flex">';

    $data .= '<div style="width: 50%">';
    $data .= '<ul class="footer-column">';
    $data .= '<li class="column-header"> ' . __('front.Pages') . '  </li>';
    foreach ($pages as $page) {
        $data .= '<li class="column-item"><a href="' . route('page', ['page' => $page->link]) . '">' . __('front.' . $page->name) . '</a></li>';
    }
    $data .= '</ul>';
    $data .= '</div>';

    $data .= '<div style="width: 50%">';
    $data .= '<ul class="footer-column">';
    $data .= '<li class="column-header">  ' . __('front.productsCat') . ' </li>';
    if (count($product_categories) > 0) {
        foreach ($product_categories as $category) {
            $data .= '<li class="column-item"><a href="' . route('product_category', ['product_category' => $category->id]) . '">' . $category->name . '</a></li>';
        }
    }
    $data .= '</ul>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</div>';

    return $data;
}
function footerWidget3()
{
    $data = '';
    $data .= '<div class="column is-3">';
    $data .= '<ul class="footer-column">';
    $data .= '<li class="column-header">' . __('front.socialmedia') . '</li>';
    $data .= '</ul>';
    $data .= '<nav class="level is-mobile mt-20">';
    $data .= '<div class="level-left level-social social_icons">';
    if (config('settings.facebook')) {
        $data .= '<a href="' . config('settings.facebook') . '" class="level-item"> <span class="icon"><i class="fa fa-facebook-square"></i></span> </a>';
    }

    if (config('settings.twitter')) {
        $data .= '<a href="' . config('settings.twitter') . '" class="level-item"> <span class="icon"><i class="fa fa-twitter"></i></span> </a>';
    }
    if (config('settings.linked_in')) {
        $data .= '<a href="' . config('settings.linked_in') . '" class="level-item"><span class="icon"><i class="fa fa-linkedin"></i></span></a>';
    }
    if (config('settings.inistagram')) {
        $data .= '<a href="' . config('settings.inistagram') . '" class="level-item"> <span class="icon"><i class="fa fa-instagram"></i></span> </a>';
    }
    if (config('settings.youtube')) {
        $data .= '<a href="' . config('settings.youtube') . '" class="level-item"> <span class="icon"><i class="fa fa-youtube"></i></span> </a>';
    }
    $data .= '</div>';
    $data .= '</nav>';
    $data .= '</div>';
    return $data;
}
function footerWidget4()
{
}
