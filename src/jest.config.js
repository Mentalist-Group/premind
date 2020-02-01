module.exports = {
  testRegex: 'resources/js/tests/unit/.*.spec.js$',
  moduleFileExtensions: [
    'js',
    'jsx',
    'json',
    'vue'
  ],
  transform: {
    '^.+\\.vue$': 'vue-jest',
    '.+\\.(css|styl|less|sass|scss|png|jpg|ttf|woff|woff2)$': 'jest-transform-stub',
    '^.+\\.jsx?$': 'babel-jest'
  },
  moduleNameMapper: {
    '^@/(.*)$': '<rootDir>/resources/js/$1'
  },
  // snapshotSerializers: [
  //   'jest-serializer-vue'
  // ],
  // testMatch: [
  //   '<rootDir>/tests/Front/unit/**/*.spec.(js|jsx|ts|tsx)|**/__tests__/*.(js|jsx|ts|tsx)'
  // ],
  // setupFiles: ["<rootDir>/jest.init.js"]
}
