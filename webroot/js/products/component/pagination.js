export const pagination_allproduct = {
    props: ['products', 'currentPage', 'pageSize'],
    methods: {
        totalPages () {
            if(this.$store.getters.totalProducts > 0){
                return Math.ceil(this.$store.getters.totalProducts / this.$store.getters.pageSize)
            }else{
                return 0
            }
        },
        showPreviousLink () {
            return this.$store.getters.currentPage <= 1 ? false : true
        },
        showNextLink () {
            return this.$store.getters.currentPage >= this.totalPages() ? false : true
        },
        changePage(pageNumber) {
            this.$store.dispatch('changePage', pageNumber)
        },
        arrowPagination(state) {
            let arrowChange = this.$store.getters.currentPage + state
            this.$store.dispatch('changePage', arrowChange)
        }
    },
    template: `<div class="row">
                    <div class="col-12">
                        <button v-if="showPreviousLink()" class="btn btn-sm ml-1 btn-light" @click="arrowPagination(-1)"> < </button>
                        <span v-for="(item, index) in totalPages()" :key="index">
                            <button :class="['btn btn-sm ml-1', $store.getters.currentPage === index + 1 ? 'btn-secondary disabled' : 'btn-light']" @click="changePage(index + 1)">{{index + 1}}</button>
                        </span>
                        <button v-if="showNextLink()" class="btn btn-sm ml-1 btn-light" @click="arrowPagination(+1)"> > </button>
                    </div>
                </div>`
}

export const pagination_category = {
    props: ['products', 'currentPage', 'pageSize'],
    methods: {
        totalPages () {
            if(this.$store.getters.totalCategoryProducts > 0){
                return Math.ceil(this.$store.getters.totalCategoryProducts / this.$store.getters.pageCategorySize)
            }else{
                return 0
            }
        },
        showPreviousLink () {
            return this.$store.getters.currentCategoryPage <= 1 ? false : true
        },
        showNextLink () {
            return this.$store.getters.currentCategoryPage >= this.totalPages() ? false : true
        },
        changePage(pageNumber) {
            this.$store.dispatch('changePage', pageNumber)
        },
        arrowPagination(state) {
            let arrowChange = this.$store.getters.currentCategoryPage + state
            this.$store.dispatch('changeCategoryPage', arrowChange)
        }
    },
    template: `<div class="row">
                    <div class="col-12">
                        <button v-if="showPreviousLink()" class="btn btn-sm ml-1 btn-light" @click="arrowPagination(-1)"> < </button>
                        <span v-for="(item, index) in totalPages()" :key="index">
                            <button :class="['btn btn-sm ml-1', $store.getters.currentCategoryPage === index + 1 ? 'btn-secondary disabled' : 'btn-light']" @click="changePage(index + 1)">{{index + 1}}</button>
                        </span>
                        <button v-if="showNextLink()" class="btn btn-sm ml-1 btn-light" @click="arrowPagination(+1)"> > </button>
                    </div>
                </div>`
}