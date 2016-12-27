<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */
// https://github.com/FriendsOfPHP/Goutte

Route::get('/', function () {
    $cliente = Goutte::getClient();
    $crawler = Goutte::request('GET', 'http://www.portal.scf.sebrae.com.br/licitante/frmPesquisarAvancadoLicitacao.aspx');
    $data = [
        'crawler' => $crawler
    ];
    
    return view('sebrae', $data);
});

Route::get('cnpq/', function () {
    $cliente = Goutte::getClient();
    $crawler = Goutte::request('GET', 'http://www.cnpq.br/web/guest/licitacoes');
    $data = [
        'crawler' => $crawler
    ];
    
    return view('cnpq', $data);
});

Route::get('ssp-df/', function () {
    $cliente = Goutte::getClient();
    $crawler = Goutte::request('GET', 'http://licitacoes.ssp.df.gov.br./index.php/licitacoes/cat_view/1-licitacoes');
    $data = [
        'crawler' => $crawler
    ];
    
    return view('ssp-df', $data);
});
    
