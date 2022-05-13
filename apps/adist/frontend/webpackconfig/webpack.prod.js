const webpack = require('webpack');
const path = require('path');
const { merge } = require('webpack-merge');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const common = require('./webpack.common');

module.exports = merge(common, {
  mode: 'production',
  devtool: false,
  performance: {
    hints: false,
    maxEntrypointSize: 512000,
    maxAssetSize: 512000
  },
  output: {
    publicPath: '/',
    path: path.resolve(__dirname, '..', '..', 'backend/public'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.(css|s[ac]ss)$/i,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
      },
      {
        test: /\.(svg|jpg|png)$/,
        loader: 'file-loader',
        options: {
          name: 'assets/media/img/[name].[ext]'
        }
      },
      {
        test: /\.(woff|woff2|eot|ttf)$/,
        loader: 'file-loader',
        options: {
          name: 'assets/media/fonts/[name].[ext]'
        }
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin({
      verbose: true,
      dry: false,
      cleanOnceBeforeBuildPatterns: [
        '**/*',
        '!.htaccess',
        '!favicon.ico',
        '!index.php',
        '!assets',
        '!assets/*',
        '!cr',
        '!cr/*',
        '!storage',
        '!storage/*'
      ]
    }),
    new MiniCssExtractPlugin({
      filename: 'styles.css'
    })
  ],
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        terserOptions: {
          output: {
            comments: false
          }
        }
      })
    ]
  }
});
