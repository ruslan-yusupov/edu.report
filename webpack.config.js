const path = require('path');

module.exports = {
    mode: undefined !== process.env.NODE_ENV ? process.env.NODE_ENV : 'production',
    entry: './src/app.js',
    output: {
        path: path.resolve(__dirname + '/src', 'dist'),
        filename: 'bundle.js'
    }
};