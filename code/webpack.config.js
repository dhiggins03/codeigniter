const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
  entry: {
    'vue/task': './resources/js/vue/Task.js',
  },
  module: {
    rules: [
      {
        test: /\.m?jsx?$/,
        use: 'babel-loader',
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
      },
      {
        test: /\.scss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader'
        ]
      },
    ],
  },
  mode: 'development',
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'resources/js/dist'),
  },
  devtool: 'source-map',
  plugins: [
    new CleanWebpackPlugin(),
    new ManifestPlugin(),
    new VueLoaderPlugin(),
  ],

  // optimization
  optimization: {
    minimize: true,
  },

};
