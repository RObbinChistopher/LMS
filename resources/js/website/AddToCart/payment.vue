<template>
    <div class="row">
        <div class="col-md-6 mb-5">
            <div class="MainContainer">
                <div class="container-content">
                    <p class="card-title mb-2 mt-3" style="font-size: 20px;">Checkout</p>
                    <div class="d-flex" style="justify-content: space-between; align-items: baseline;">
                        <p class="card-title mb-2 mt-3">Payment method</p>
                        <p>Secure and encrypted &nbsp;<i class="fa-solid fa-lock"></i></p>
                    </div>
                    <div style="border: 1px solid #acadb0;border-radius: 5px; overflow: hidden;">
                        <div class="d-flex card-header"
                            style="justify-content: space-between;align-items: anchor-center;">
                            <div class="d-flex gap-2" style="align-items: center;">
                                <div>
                                    <input class="form-check-input mt-1" type="radio" checked name="flexRadioDefault"
                                        id="flexRadioDefault1" style="padding: 8px;">
                                </div>
                                <i class="fa-regular fa-credit-card" style="font-size: 20px;"></i>
                                <p class="card-title" style="font-size: 16px;">Cards</p>
                            </div>
                            <div class="d-flex gap-1" style="justify-content: end;">
                                <img src="https://www.udemy.com/staticx/udemy/images/v9/card-visa.svg"
                                    style="width: 10%;" alt="">
                                <img src="https://www.udemy.com/staticx/udemy/images/v9/card-mastercard.svg"
                                    style="width: 10%;" alt="">
                                <img src="https://www.udemy.com/staticx/udemy/images/v9/card-amex.svg"
                                    style="width: 10%;" alt="">
                                <img src="https://www.udemy.com/staticx/udemy/images/v9/card-discover.svg"
                                    style="width: 10%;" alt="">
                                <img src="https://www.udemy.com/staticx/udemy/images/v9/card-jcb.svg"
                                    style="width: 10%;" alt="">
                            </div>
                        </div>
                        <div class="row mt-3 p-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="desktopSlider" class="form-label">Card number *</label>
                                    <input v-model="cardNumber" class="form-control" v-mask="cardMask"
                                        @input="detectCardType" placeholder="1234 5678 9012 3456" maxlength="19" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desktopSlider" class="form-label">Expiry Date *</label>
                                    <input v-model="expiryDate" v-mask="'##/##'" class="form-control"
                                        placeholder="MM/YY" maxlength="5" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desktopSlider" class="form-label">CVV *</label>
                                    <input v-model="cvv" v-mask="'###'" class="form-control" placeholder="CVV"
                                        maxlength="3" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="desktopSlider" class="form-label">Card Name *</label>
                                    <input class="form-control" placeholder="Card Name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault" style="color: black;">
                                        Securely save this card for my later purchase
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="card-title mt-4 mb-3">Order details <span>(3 courses)</span></p>
                    <div v-for="course in courses" :key="course.id" class="row mb-3"
                        style="border-bottom: 1px solid #b9b6b6;">
                        <div class="col-md-2" style="width: 15.333333%;">
                            <img :src="course.image" style="width: 100%;" :alt="course.title">
                        </div>
                        <div class="col-md-7">
                            <p class="card-title mb-0" style="font-size: 16px; font-weight: 800;">
                                {{ course.title }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="card-title mb-2">
                                <span class="d-flex gap-2"
                                    style="font-size: 18px; font-weight: 900; color: #361d67; align-items: end;">${{
                                        course.price }}<i class="fa-solid fa-tag"></i></span>
                                <span style="text-decoration: line-through; font-size: 14px;">
                                    ${{ course.originalPrice }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-3" style="background-color: #f6f7f9;">
            <div class="container-content2 mt-5">
                <p class="card-title" style="font-size: x-large;">Order summary</p>
                <div class="flex-betwen mb-2 mt-3">
                    <p class="mb-0">Original Price:</p>
                    <p class="mb-0">$239.97</p>
                </div>
                <div class="flex-betwen">
                    <p class="mb-0">Discounts (84% Off):</p>
                    <p class="mb-0">-$201.00</p>
                </div>
                <hr>
                <div class="flex-betwen">
                    <p class="card-title mb-3">Total: <span>(3 courses)</span></p>
                    <p class="card-title mb-3">$38.97</p>
                </div>
                <p class="mb-0" style="font-size: 13px;">By completing your purchase, you agree to these <span
                        style="color: #361d67;">Terms of Use.</span></p>
                <p class="btn-all-data-science-course mb-2" style="text-align: center;"><i class="fa-solid fa-lock"></i> Pay $38.97</p>
                <div class="flex-center mt-4">
                    <p class="card-title">30-Day Money-Back Guarantee</p>
                    <p style="font-size: 13px;">Not satisfied? Get a full refund within 30 days. Simple and straightforward!</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mask } from "vue-the-mask";

export default {
    directives: { mask },
    data() {
        return {
            cardNumber: "",
            expiryDate: "",
            cardName: "",
            cvv: "",
            cardType: null,
            cardPatterns: {
                visa: /^4/,
                mastercard: /^5[1-5]/,
                amex: /^3[47]/,
                discover: /^6/,
                unionpay: /^62/, // UnionPay (UCB)
            },
            courses: [
                {
                    id: 1,
                    image: "https://img-c.udemycdn.com/course/100x100/4885940_14ce_2.jpg",
                    title: "Data Science Real World Projects in Python",
                    duration: "133.5",
                    updated: "1/2025 Updated",
                    rating: 4.5,
                    students: "3,622",
                    price: 9.99,
                    originalPrice: 47.99
                },
                {
                    id: 2,
                    image: "https://img-c.udemycdn.com/course/100x100/2367072_711c.jpg",
                    title: "Machine Learning Masterclass",
                    duration: "85.0",
                    updated: "2/2025 Updated",
                    rating: 4.7,
                    students: "5,100",
                    price: 12.99,
                    originalPrice: 59.99
                },
                {
                    id: 3,
                    image: "https://img-c.udemycdn.com/course/100x100/3730682_ea10_6.jpg",
                    title: "Full-Stack Web Development with Vue.js",
                    duration: "120.0",
                    updated: "3/2025 Updated",
                    rating: 4.8,
                    students: "4,500",
                    price: 14.99,
                    originalPrice: 69.99
                },
                {
                    id: 4,
                    image: "https://img-c.udemycdn.com/course/100x100/5961214_0e9b_3.jpg",
                    title: "The Top Data Scientist ™ BootCamp",
                    duration: "120.0",
                    updated: "3/2025 Updated",
                    rating: 4.8,
                    students: "4,500",
                    price: 14.99,
                    originalPrice: 69.99
                }
            ],
        };
    },
    computed: {
        cardMask() {
            return this.cardType === "amex" ? "#### ###### #####" : "#### #### #### ####";
        },
    },
    methods: {
        detectCardType() {
            const num = this.cardNumber.replace(/\s/g, "");
            this.cardType = Object.keys(this.cardPatterns).find((type) =>
                this.cardPatterns[type].test(num)
            );
        },
        getCardImage(type) {
            const images = {
                visa: "",
                mastercard: "",
                amex: "",
                discover: "	",
                unionpay: "",
            };

            return images[type] || "";
        }
    },
};
</script>
<style scoped>
.MainContainer {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: end;
}

.container-content {
    width: 550px;
    padding-right: 2rem;
}

.container-content2 {
    width: 330px;
    margin-left: 2rem;
}

.form-check-input:checked {
    background-color: #361d67 !important;
    border-color: #361d67;
}

.card-header {
    padding: 10px 9px;
    background: #f6f7f9;
}

.flex-betwen {
    display: flex;
    justify-content: space-between;
}
</style>