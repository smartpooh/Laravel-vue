import axios from 'axios';
import store from './store'
import router from './router'

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.interceptors.request.use(
    config => {
        let token = sessionStorage.getItem('token');
        if (token) {
            config.headers['Authorization'] = 'Bearer ' + token
        }
        return config
    },
    err => {
        return Promise.reject(err);
    }
)

axios.interceptors.response.use(
    (response) => {
        return response;
    },
    err => {
        if(err.response.status == 401){
            router.push('/signin');
            //强制刷新，重构router
            router.go(0);
            sessionStorage.clear();
            if(typeof(err.response.data.msg) == "string"){
                Message.error(err.response.data.msg);
            }else{
                Message.error("请登陆!");
            }
        }else if(err.response.status == 500){
            Message.error("服务器错误");
        }else if(err.response.status == 429){
            Message.error("尝试次数过多！请稍后再试");
        }else if(err.response.status >= 400){
            if(response.data.msg){
                Message.error(err.response.data.msg);
            }else{
                Message.warning("访问错误");
            }
        }
        return Promise.reject(err);
    }
)

export default axios;
