const webpack = require('webpack');
const path = require('path');
const { merge } = require('webpack-merge');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const commonConfig = require('./webpack.common');

module.exports = merge(commonConfig, {
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.(css|s[ac]ss)$/i,
        use: ['style-loader', 'css-loader', 'sass-loader']
      },
      {
        test: /\.(woff|woff2|eot|ttf|svg|jpg|png)$/,
        loader: 'file-loader'
      }
    ]
  },
  output: {
    publicPath: '/',
    path: path.resolve(__dirname, '..', 'public'),
    filename: 'bundle.[contenthash].js',
    chunkFilename: 'bundle.chunk.js'
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: JSON.stringify('development'),
        REACT_APP_API: JSON.stringify('http://cinemex')
      }
    }),
    new HtmlWebpackPlugin({
      template: path.resolve(__dirname, '..', 'src/template', 'index.html')
    })
  ],
  devServer: {
    port: 3000,
    open: true,
    hot: false,
    static: {
      directory: path.resolve(__dirname, '..', 'public')
    },
    historyApiFallback: true
  },
  optimization: {
    splitChunks: {
      chunks: 'all',
      name: false,
      automaticNameDelimiter: '-',
      cacheGroups: {
        vendors: {
          test: /[\\/]node_modules[\\/]/,
          priority: -10
        },
        default: {
          minChunks: 2,
          priority: -20,
          reuseExistingChunk: true
        }
      }
    }
  }
});
