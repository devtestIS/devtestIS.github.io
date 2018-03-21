var webpack = require('webpack');
var path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CopyWebpackPlugin = require('copy-webpack-plugin');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var SpritesmithPlugin = require('webpack-spritesmith');
var WriteFilePlugin = require('write-file-webpack-plugin');


module.exports = {
    entry: {
        bundle: './app/js/index.js'
    },
    output: {
        path: path.join(__dirname, 'dist'),
        filename: '[name].[chunkhash].js'
    },
    module: {
        rules: [{
                use: 'babel-loader',
                test: /\.js$/,
                exclude: /node_modules/
            },
            {
                test: /\.pug$/,
                use: 'pug-loader'
            },
            {
                loader: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [{
                        loader: 'css-loader',
                        options: {
                            url: false
                        }
                    }, 'postcss-loader', 'sass-loader']
                }),
                test: /\.(sass|scss)$/

            },
            {
                test: /\.(jpe?g|png|gif|svg)$/,
                use: [{
                        loader: 'url-loader',
                        options: {
                            limit: 40000
                        }
                    },
                    'image-webpack-loader'
                ]
            },
            {
                test: /\.(woff2?|svg)$/,
                loader: 'url-loader?limit=10000'
            },
            {
                test: /\.(ttf|eot)$/,
                loader: 'file-loader'
            },
            {
                test: /bootstrap-sass[\/\\]assets[\/\\]javascripts[\/\\]/,
                loader: 'imports-loader?jQuery=jquery'
            },
            {
                test: /\.(png|jpe?g|gif|svg|woff|woff2|ttf|eot|ico)?(\?v=[0–9]\.[0–9]\.[0–9])?$/,
                loader: 'file?name=[name].[hash].[ext]?'
            }
        ]
    },
    resolve: {
        modules: ["node_modules", "spritesmith-generated"]
    },
    plugins: [
        new HtmlWebpackPlugin({
            title: 'title',
            template: 'app/pug/index.pug',
            hash: true
        }),
        new webpack.optimize.CommonsChunkPlugin({
            names: ['manifest']
        }),
        new ExtractTextPlugin('style.css'),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
        }),
        new CopyWebpackPlugin([{
            from: 'app/img/assets',
            to: 'image/assets'
        },
        {
            from: 'app/fonts',
            to: 'fonts'
        }]),
        new SpritesmithPlugin({
            src: {
                cwd: path.resolve(__dirname, 'app/img/sprites'),
                glob: '*.png'
            },
            target: {
                image: path.resolve(__dirname, 'dist/image/sprite.png'),
                css: path.resolve(__dirname, 'app/sass/base/sprite.sass')
            },
            apiOptions: {
                cssImageRef: "~sprite.png"
            }
        }),
        new WriteFilePlugin()
    ]
};
