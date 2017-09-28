var path = require('path')  //固定
var webpack = require('webpack')

module.exports = {
  context: path.resolve(__dirname,'./src'),           // 资源目录
  entry: {                                            // 入口文件
    app: './app.js'
  },
  output: {
    path: path.resolve(__dirname,'./dist'),
    filename: 'bundle.js'
  },
  plugins: [                                           // 插件
    new webpack.optimize.UglifyJsPlugin()              // 压缩插件
  ]
}