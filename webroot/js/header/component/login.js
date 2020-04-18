export const login = {
    props:['url'],
    data () {
        return {
            url: 'dfsdfsfsdfsdf'
        }
    },
    methods: {
        logOut () {
            this.$store.dispatch('logout')
        },
        logIn () {
            window.location.replace(window.location + '/login')
        }
    },
    computed: {
        chkLogin () {
            // console.log(localStorage.getItem('_u_ss_isset'))
            if(this.$store.getters.userLogin == true) {
                localStorage.setItem('_u_ss_ison_t', true)
            }
            // console.log(localStorage.getItem('_u_ss_isset'))
            // console.log(localStorage.getItem('_u_ss_ison_t'))
        }
    },
    template: `<li class="mega_items">
                    {{chkLogin}}
                    <a v-if="localStorage.getItem('_u_ss_ison_t')" href="javascript:void(0)">บัญชีผู้ใช้ <i class="ion-ios-arrow-down"></i></a>
                        <div v-if="localStorage.getItem('_u_ss_ison_t')" class="mega_menu user_account">
                            <ul class="mega_menu_inner user_account">
                                <li><a href="#"><i class="fa fa-user-circle"></i> จัดการบัญชี : {{$cookies.get('_u_ss_isprop')}}</a></li>
                                <li><a href="#"><i class="fa fa-cubes"></i> รายการสั่งซื้อ</a></li>
                                <li><a href="" @click="logOut()"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                            </ul>
                        </div>
                    <a v-if="!localStorage.getItem('_u_ss_ison_t')" href="http://localhost/git/bpprogress-fron/login">เข้าสู่ระบบ</a>
                </li>`
}