import axios from 'axios'
const auth = {
    async check() {
        if (localStorage.token) {
            const url = '/api/auth/check'
            const data = {}
            data.token = localStorage.getItem('token')
            try {
                return (await axios.post(url, data)).data.authenticated
            } catch (e) {
                return false
            }
        }
        return false
    }
}

export default auth
