export const login = {
    props:['url'],
    data () {
        return {
            
        }
    },
    methods: {
        logOut () {
            this.$store.dispatch('logout')
        },
        logIn () {
            setTimeout("window.location.href='/login';", 0)
        }
    },
    computed: {
        chkLogin () {
            this.$store.dispatch('checkStillUser')
            if(this.$store.getters.userExp){
                this.$store.dispatch('logout')
            }
        }
    },
    template: `<li class="mega_items">
                    {{chkLogin}}
                    <a v-if="localStorage.getItem('_u_ss_ison_t')" href="javascript:void(0)">บัญชีผู้ใช้ <i class="ion-ios-arrow-down"></i></a>
                        <div v-if="localStorage.getItem('_u_ss_ison_t')" class="mega_menu user_account">
                            <ul class="mega_menu_inner user_account">
                                <li><a :href="'/account'"><i class="fa fa-user-circle"></i> ข้อมูลบัญชี : {{$cookies.get('_u_ss_isprop')}}</a></li>
                              
                                <li><a href="" @click="logOut()"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                            </ul>
                        </div>
                    <a v-if="!localStorage.getItem('_u_ss_ison_t')" href="" @click="logIn()">เข้าสู่ระบบ</a>
                </li>`
}