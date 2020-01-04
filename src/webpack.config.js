const path = require('path');

module.exports = {
    mode: undefined !== process.env.NODE_ENV ? process.env.NODE_ENV : 'production',
    entry: './app/index.js',
    output: {
        path: path.resolve(__dirname + '/', 'dist'),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            }
        ]
    }
};