'use strict';

var path = require('path')
  , webpack = require('webpack');

var staticPath = path.resolve(__dirname)
  , publicPath = path.resolve(__dirname, '../', './web/public')
  , vendorPath = path.join(staticPath, 'js/vendor');

module.exports = {

  cache: true,

  context: staticPath,

  entry: {
    app: path.join(staticPath, 'js/app.js')
  },

  output: {
    path: path.join(publicPath, '/js'),
    filename: '[name].bundle.js',
    chunkFilname: '[id].bundle.js'
  },

  module: {
    loaders: [
      { test: /\.jade$/, loader: "jade" },
      { test: /\.css$/, loader: 'style!css' },
      { test: /\.html$/, loader: 'raw'}
    ],
    noParse: [vendorPath]
  },

  resolve: {
    alias: {
      bower: vendorPath,
      jquery: 'bower/jquery',
      'jquery-ui-sortable': 'bower/jquery-ui-sortable/jquery-ui-sortable.min.js'
    },
    extensions: ['', '.js', '.styl', '.css'],
    root: [staticPath, vendorPath]
  },

  plugins: [
    new webpack.ResolverPlugin([
      new webpack.ResolverPlugin.DirectoryDescriptionFilePlugin('bower.json', ['main'])
    ]),

    new webpack.optimize.CommonsChunkPlugin('vendor', 'vendor.bundle.js')
  ],

  devtool: 'eval'
};