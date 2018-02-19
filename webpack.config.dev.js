var webpack = require('webpack');
var path = require('path');
var isProduction = process.env.NODE_ENV === 'production';
var ExtractTextPlugin = require("extract-text-webpack-plugin");
require('dotenv').config({path: './.env', silent: true});

module.exports = {
    entry: {
        client: './resources/assets/client/client.js',
        admin: './resources/assets/admin/admin.js',
    },
    output: {
        path: path.resolve(__dirname, './public/builds'),
        filename: '[name].js',
        publicPath: 'http://localhost:8081/',
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
                        // the "scss" and "sass" values for the lang attribute to the right configs here.
                        // other preprocessors should work out of the box, no loader config like this nessessary.
                        js: 'babel-loader',
                        scss: 'vue-style-loader!css-loader!sass-loader',
                        sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax',
                    }
                    // other vue-loader options go here
                }
            },
            {
                test: /\.less$/,
                use: ['style-loader', 'css-loader', 'less-loader']
            },
            {
                test: /\.(sass|scss)$/,
                use: ['style-loader', 'css-loader', 'sass-loader']
            },
            {
                test: /\.(png|jpeg|jpg|gif|svg|eot|ttf|woff|woff2)$/,
                use: 'url-loader'

            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader',]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            }
        ]
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.common.js',
            'jquery': 'jquery/dist/jquery.js',
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true,
        // headers: {
        //     "Access-Control-Allow-Origin": "*",
        //     "Access-Control-Allow-Credentials": "true"
        // },
        // setup: function(app) {
        //     mocking(app);
        // },
        proxy: {
            '*': {
                target:  process.env.APP_URL,
                changeOrigin: true,
                secure: false,
                cookieDomainRewrite: '',
                onProxyReq: function (request, req, res) {
                    request.setHeader('origin', process.env.APP_URL)
                }
            },
        }
    },
    plugins: [
        new webpack.ProvidePlugin({
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery'
        })
    ]
}

