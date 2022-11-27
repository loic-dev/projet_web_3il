const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require("terser-webpack-plugin");

var config = {    
      plugins: [
        new MiniCssExtractPlugin({
          filename: "../data/Public/dist/bundle.[name].css",
        }),
      ],
      module: {
        rules: [
          {
            test: /\.css$/,
            use: [MiniCssExtractPlugin.loader, "css-loader"],
          },
        ],
      },
      optimization: {
        minimizer: [
          new CssMinimizerPlugin(),
          new TerserPlugin(),
        ],
        minimize: true,
      },
  }

var viewIndexCss = Object.assign({}, config, {
  name: "viewIndex",
  entry: { 
    viewIndex: ['./data/Public/CSS/viewIndex.css', './data/Public/CSS/atelier.css', './data/Public/CSS/footer.css']
  },
});

var headCss = Object.assign({}, config,{
  name: "head",
  entry: { 
    head:   ['./data/Public/CSS/style.css', './data/Public/CSS/header.css', './data/Public/CSS/footer.css']
  },
});

var viewIndexJs = Object.assign({}, config,{
  entry: ['./data/Public/js/all.js', './data/Public/js/event.js', './data/Public/js/hamburger.js'],
  output: {
    filename: '../data/Public/dist/bundle.viewIndex.js',
  },
});

var printCss = Object.assign({}, config,{
  name: "print",
  entry: { 
    print:   ['./data/Public/CSS/print.css']
  },
});

var hamburgerJs = Object.assign({}, config,{
  entry: ['./data/Public/js/hamburger.js'],
  output: {
    filename: '../data/Public/dist/bundle.hamburger.js',
  },
});

module.exports = [
  viewIndexCss, headCss, viewIndexJs, printCss, hamburgerJs
];





