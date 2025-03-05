// src/config.js
const config = {
    development: {
        apiBaseUrl: 'http://localhost:8000/api/'
    },
    production: {
        apiBaseUrl: 'https://lms.visetech.org/api/'
    }
};

const environment = 'development';
export default config[environment];
