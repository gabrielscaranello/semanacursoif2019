module.exports = {
    root: true,
    env: {
        node: true
    },
    'extends': [
        'standard',
        'plugin:vue/essential'
    ],
    rules: {
        'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'space-before-function-paren': 'off',
        'indent': 0,
        'indent-legacy': ['error', 4],
        'no-param-reassign': ['error', { 'props': false }],
        'no-trailing-spaces': ['error', { 'skipBlankLines': true }],
        'no-underscore-dangle': ['error', { 'allowAfterThis': true }],
        'no-unused-expressions': ['error', { 'allowTernary': true }],
        'max-len': 'off',
        'prefer-destructuring': 'off'
    },
    parserOptions: {
        parser: 'babel-eslint'
    }
}
