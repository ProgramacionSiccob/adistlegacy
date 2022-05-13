const webpack = require('webpack');
const path = require('path');

module.exports = {
  entry: path.resolve(__dirname, '..', 'src/index.js'),
  resolve: {
    extensions: ['.js', '.jsx']
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx|ts|tsx)$/,
        include: path.resolve(__dirname, '..', 'src'),
        exclude: /node_modules/,
        use: ['babel-loader']
      }
    ]
  },
  plugins: [new webpack.HotModuleReplacementPlugin()]
};
