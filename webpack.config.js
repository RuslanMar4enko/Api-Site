var webpack = require('webpack');
var path = require('path');
var isProduction = process.env.NODE_ENV === 'production';
var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {
        client: './resources/assets/client/client.js',
        admin: './resources/assets/admin/admin.js',
    },
    output: {
        path: path.resolve(__dirname, './public/builds'),
        filename: '[name].js',
        publicPath: '/builds/',
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        css: ExtractTextPlugin.extract({
                            use: 'css-loader',
                            fallback: 'vue-style-loader' // <- this is a dep of vue-loader, so no need to explicitly install if using npm3
                        }),
                        // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
                        // the "scss" and "sass" values for the lang attribute to the right configs here.
                        // other preprocessors should work out of the box, no loader config like this nessessary.
                        js: 'babel-loader',
                        scss: ExtractTextPlugin.extract({
                            use: ['css-loader', 'sass-loader'],
                            fallback: 'style-loader'
                        }),
                        sass: ExtractTextPlugin.extract({
                            use: ['css-loader', 'sass-loader'],
                            fallback: 'style-loader'
                        }),
                    }
                    // other vue-loader options go here
                }
            },
            {
                test: /\.less$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'less-loader'],
                    fallback: "style-loader"
                })
            },
            {
                test: /\.(sass|scss)$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: 'style-loader'
                })
            },
            {
                test: /\.(png|jpeg|jpg|gif|svg|eot|ttf|woff|woff2)$/,
                // use: 'url-loader',
                loader: 'url-loader',
                options: {
                    limit: 10000
                }
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader',]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: "babel-loader"
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery'
        }),
        new ExtractTextPlugin('[name].css'),
    ]
}

if (isProduction) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    )
}