<template>
    <v-layout>

              <div id="header-mobile" class="navbar-light fixed-top header-static bg-mode d-block d-md-none">
         <div id="mobile-header-navbar">
            <!-- Logo Nav START -->
            <nav class="navbar py-2 container justify-content-center">
               <div id="user-options-modal-container">
                  <!-- Button trigger modal -->
                  <div type="button" class="d-flex flex-row justify-content-center flex-nowrap gap-1" data-bs-toggle="modal" data-bs-target="#user-options-modal">
                     <!-- Logo START -->
                     <div class="navbar-brand-logo">
                        <img class="light-mode-item navbar-brand-item" :src="logoUrl" />
                        <img class="dark-mode-item navbar-brand-item" :src="logoUrl" />
                     </div>
                     <!-- Logo END -->
                     <div  id="btn-open-user-options-modal" class="btn-svg-icon" v-if="$page.props.auth.user">
                        <svg class="down-dropdown" width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M0.857178 1.59998L11.4 12.1428C11.477 12.2248 11.5699 12.2902 11.6731 12.3349C11.7763 12.3795 11.8876 12.4026 12 12.4026C12.1125 12.4026 12.2237 12.3795 12.3269 12.3349C12.4301 12.2902 12.5231 12.2248 12.6 12.1428L23.1429 1.59998" stroke="black" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </div>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade bottom" id="user-options-modal" tabindex="-1" aria-labelledby="user-options-modalLabel" aria-hidden="true" v-if="$page.props.auth.user">
                     <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                           <div class="modal-header container justify-content-end">
                              <button type="button" id="close-user-options-modal" class="btn btn-unstyled" data-bs-dismiss="modal" aria-label="Close">
                                 <svg class="up-dropdown" width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.1428 12.4L12.6 1.85717C12.523 1.77517 12.4301 1.70982 12.3269 1.66514C12.2237 1.62047 12.1124 1.59742 12 1.59742C11.8875 1.59742 11.7763 1.62047 11.6731 1.66514C11.5699 1.70982 11.4769 1.77517 11.4 1.85717L0.857108 12.4" stroke="black" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </button>
                           </div>
                           <div class="modal-body">
                              <a :href="route('customer.profile')">
                                 <div class="d-flex flex-column justify-content-center align-items-center gap-3 avatar-name-container mb-4">
                                    <!-- Avatar -->
                                    <div class="avatar-on-mobile-modal">
                                       <div class='user_avatar_wrapper_sm' style=''><img style="" :src="profileUrl" /></div>
                                    </div>
                                    <div class="h5 text-capitalize text-center">{{ $page.props.auth.user.name }}</div>
                                 </div>
                              </a>
                              <ul class="ms-sm-3 list-unstyled">

                                <li>
                                    <hr class="dropdown-divider-gray">
                                </li>
                                <li>
                                    <DropdownLink
                                        :href="route('customer.profile')"
                                        as="a"
                                        class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                    >
                                        <svg class="desktop-menu-item-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 8C10.21 8 12 6.21 12 4C12 1.79 10.21 0 8 0C5.79 0 4 1.79 4 4C4 6.21 5.79 8 8 8ZM8 10C5.33 10 0 11.34 0 14V16H16V14C16 11.34 10.67 10 8 10Z" fill="#272727"/>
                                    </svg>
                                    <span class="desktop-menu-item ms-2"> My Account</span>
                                    </DropdownLink>
                                </li>
                                <li>
                                    <hr class="dropdown-divider-gray">
                                </li>
                                <li>
                                    <DropdownLink
                                        :href="route('passedaway.profile.bio')"
                                        as="a"
                                        class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                    >
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="1" width="22" height="22" rx="4" stroke="#000" stroke-width="2" />
                                        <path d="M4 12L10 18L20 6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <span class="desktop-menu-item ms-2"> Remember Profile</span>
                                    </DropdownLink>
                                </li>
                                <li>
                                    <hr class="dropdown-divider-gray">
                                </li>
                                <li>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                    >
                                    <svg class="desktop-menu-item-icon" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 4L13.59 5.41L16.17 8H6V10H16.17L13.59 12.58L15 14L20 9L15 4ZM2 2H10V0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H10V16H2V2Z" fill="#272727"/>
                                    </svg>
                                    <span class="desktop-menu-item ms-2"> Log Out</span>

                                </DropdownLink>
                                </li>
                                <li>
                                    <hr class="dropdown-divider-gray">
                                </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </nav>
            <!-- Logo Nav END -->
         </div>
      </div>
        <header id="desktop-header" class="navbar-light fixed-top header-static bg-mode d-none d-md-block">
           <div id="desktop-header-navbar">
              <!-- Logo Nav START -->
              <nav
                 style="padding: 0 2rem;"
                 class="navbar navbar-expand-lg d-flex justify-content-center align-items-center"
                 >
                 <div class="d-flex w-100 flex-row justify-content-center justify-content-sm-between align-items-center">
                    <!-- Logo START -->
                    <div class="navbar-brand">
                       <img class="light-mode-item navbar-brand-item" :src="logoUrl" />
                       <img class="dark-mode-item navbar-brand-item" :src="logoUrl" />
                    </div>
                    <!-- Logo END -->
                    <div class="d-flex flex-row justify-content-center flex-nowrap gap-1" id="mainMenu">
                       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <!-- <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link stroke-color fill-color d-flex flex-column align-items-center " aria-current="">
                                <svg height="35" width="35" viewBox="0 0 36 32" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M16.7801 7C16.7801 11.5369 12.5507 15.2149 7.3335 15.2149C12.5507 15.2149 16.7801 18.8928 16.7801 23.4297C16.7801 18.8928 21.0095 15.2149 26.2267 15.2149C21.0095 15.2149 16.7801 11.5369 16.7801 7Z"  stroke-linecap="round" stroke-linejoin="round"/>
                                   <path d="M25.61 18.7852C25.61 21.0536 23.4953 22.8926 20.8867 22.8926C23.4953 22.8926 25.61 24.7316 25.61 27C25.61 24.7316 27.7247 22.8926 30.3333 22.8926C27.7247 22.8926 25.61 21.0536 25.61 18.7852Z"  stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="m-0" style="margin-top: -6px!important;">Discover</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link stroke-color d-flex flex-column align-items-center " aria-current="">
                                <div style="margin-top: 1px;">
                                   <svg height="25" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.10529 14.1881L11.7977 20.7056C12.0282 20.9301 12.1434 21.0423 12.2794 21.07C12.3406 21.0824 12.4035 21.0824 12.4647 21.07C12.6007 21.0423 12.7159 20.9301 12.9464 20.7056L19.6388 14.1881C21.5218 12.3543 21.7504 9.33669 20.1667 7.22062L19.869 6.82273C17.9745 4.2913 14.1717 4.71584 12.8405 7.60739C12.6524 8.01584 12.0916 8.01584 11.9036 7.60739C10.5724 4.71584 6.76962 4.2913 4.87511 6.82274L4.57734 7.22062C2.99368 9.33669 3.22234 12.3543 5.10529 14.1881Z"  stroke-width="2"/>
                                   </svg>
                                </div>
                                <p class="m-0">Favorites</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link stroke-color d-flex flex-column align-items-center" href="javascript:void(0)">
                                <div style="margin-top: 1px;">
                                   <svg height="25" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M4.64405 9.93111C4.72407 8.93531 5.55554 8.16797 6.55455 8.16797H18.1107C19.1096 8.16797 19.9411 8.93531 20.0211 9.93111L20.7912 19.5144C20.8808 20.6299 19.9998 21.5846 18.8807 21.5846H5.78446C4.66539 21.5846 3.78432 20.6299 3.87396 19.5144L4.64405 9.93111Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                      <path d="M16.1672 11.043V6.2513C16.1672 4.13421 14.4509 2.41797 12.3338 2.41797C10.2167 2.41797 8.50049 4.13421 8.50049 6.2513V11.043"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                   </svg>
                                </div>
                                <p class="m-0">Shop</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link stroke-color d-flex flex-column align-items-center ">
                                <div style="margin-top: 1px">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 35 32" fill="none">
                                      <path d="M9.76923 7.13636C9.76923 7.96818 9.46532 8.76593 8.92435 9.35411C8.38338 9.94229 7.64966 10.2727 6.88462 10.2727C6.11957 10.2727 5.38585 9.94229 4.84488 9.35411C4.30391 8.76593 4 7.96818 4 7.13636C4 6.30455 4.30391 5.5068 4.84488 4.91862C5.38585 4.33044 6.11957 4 6.88462 4C7.64966 4 8.38338 4.33044 8.92435 4.91862C9.46532 5.5068 9.76923 6.30455 9.76923 7.13636ZM9.76923 15.5C9.76923 16.3318 9.46532 17.1296 8.92435 17.7177C8.38338 18.3059 7.64966 18.6364 6.88462 18.6364C6.11957 18.6364 5.38585 18.3059 4.84488 17.7177C4.30391 17.1296 4 16.3318 4 15.5C4 14.6682 4.30391 13.8704 4.84488 13.2823C5.38585 12.6941 6.11957 12.3636 6.88462 12.3636C7.64966 12.3636 8.38338 12.6941 8.92435 13.2823C9.46532 13.8704 9.76923 14.6682 9.76923 15.5ZM9.76923 23.8636C9.76923 24.6955 9.46532 25.4932 8.92435 26.0814C8.38338 26.6696 7.64966 27 6.88462 27C6.11957 27 5.38585 26.6696 4.84488 26.0814C4.30391 25.4932 4 24.6955 4 23.8636C4 23.0318 4.30391 22.2341 4.84488 21.6459C5.38585 21.0577 6.11957 20.7273 6.88462 20.7273C7.64966 20.7273 8.38338 21.0577 8.92435 21.6459C9.46532 22.2341 9.76923 23.0318 9.76923 23.8636Z" fill="#272727" fill-opacity="0.4"/>
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6953 8.18022C11.6953 7.90295 11.7966 7.63703 11.9769 7.44097C12.1573 7.24491 12.4018 7.13477 12.6569 7.13477H28.0415C28.2965 7.13477 28.5411 7.24491 28.7214 7.44097C28.9017 7.63703 29.003 7.90295 29.003 8.18022C29.003 8.45749 28.9017 8.72341 28.7214 8.91947C28.5411 9.11553 28.2965 9.22567 28.0415 9.22567H12.6569C12.4018 9.22567 12.1573 9.11553 11.9769 8.91947C11.7966 8.72341 11.6953 8.45749 11.6953 8.18022ZM11.6953 16.5439C11.6953 16.2666 11.7966 16.0007 11.9769 15.8046C12.1573 15.6085 12.4018 15.4984 12.6569 15.4984H28.0415C28.2965 15.4984 28.5411 15.6085 28.7214 15.8046C28.9017 16.0007 29.003 16.2666 29.003 16.5439C29.003 16.8211 28.9017 17.087 28.7214 17.2831C28.5411 17.4792 28.2965 17.5893 28.0415 17.5893H12.6569C12.4018 17.5893 12.1573 17.4792 11.9769 17.2831C11.7966 17.087 11.6953 16.8211 11.6953 16.5439ZM11.6953 24.9075C11.6953 24.6302 11.7966 24.3643 11.9769 24.1682C12.1573 23.9722 12.4018 23.862 12.6569 23.862H28.0415C28.2965 23.862 28.5411 23.9722 28.7214 24.1682C28.9017 24.3643 29.003 24.6302 29.003 24.9075C29.003 25.1848 28.9017 25.4507 28.7214 25.6467C28.5411 25.8428 28.2965 25.9529 28.0415 25.9529H12.6569C12.4018 25.9529 12.1573 25.8428 11.9769 25.6467C11.7966 25.4507 11.6953 25.1848 11.6953 24.9075Z" fill="#272727" fill-opacity="0.4"/>
                                   </svg>
                                </div>
                                <p class="mb-0">Updates</p>
                             </a>
                          </li>
                          <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link stroke-color d-flex flex-column align-items-center " aria-current="">
                                <div style="margin-top: 1px;">
                                   <svg height="25" width="25" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M1.7085 4.16797L13.2085 4.16797M13.2085 4.16797C13.2085 5.75579 14.4957 7.04297 16.0835 7.04297C17.6713 7.04297 18.9585 5.75579 18.9585 4.16797C18.9585 2.58015 17.6713 1.29297 16.0835 1.29297C14.4957 1.29297 13.2085 2.58015 13.2085 4.16797ZM7.4585 11.8346L18.9585 11.8346M7.4585 11.8346C7.4585 13.4225 6.17131 14.7096 4.5835 14.7096C2.99568 14.7096 1.7085 13.4225 1.7085 11.8346C1.7085 10.2468 2.99568 8.95964 4.5835 8.95964C6.17131 8.95964 7.4585 10.2468 7.4585 11.8346Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                   </svg>
                                </div>
                                <p class="m-0">Settings</p>
                             </a>
                          </li> -->
                       </ul>
                    </div>
                    <!-- Nav right START -->
                    <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled" v-if="$page.props.auth.user">
                       <li class="nav-item ms-2 dropdown">
                          <a class="nav-link btn " href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                             <div style="max-width:70px" >
                                <div class='user_avatar_wrapper_sm' style=''><img style="" :src="profileUrl" /></div>
                             </div>
                          </a>
                          <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                             <li class="px-3">
                                <a :href="route('customer.profile')">
                                   <div class="d-flex flex-column justify-content-center align-items-center gap-3 avatar-name-container">
                                      <div class="avatar-on-mobile-modal">
                                         <div class='user_avatar_wrapper_sm' style=''><img style="" :src="profileUrl" /></div>
                                      </div>
                                      <div class="h5 text-capitalize text-center">{{ $page.props.auth.user.name }}</div>
                                   </div>
                                </a>
                             </li>
                             <li>
                                <hr class="dropdown-divider">
                             </li>
                             <li>
                                <DropdownLink
                                    :href="route('customer.profile')"
                                    as="a"
                                    class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                >
                                    <svg class="desktop-menu-item-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8 8C10.21 8 12 6.21 12 4C12 1.79 10.21 0 8 0C5.79 0 4 1.79 4 4C4 6.21 5.79 8 8 8ZM8 10C5.33 10 0 11.34 0 14V16H16V14C16 11.34 10.67 10 8 10Z" fill="#272727"/>
                                   </svg>
                                   <span class="desktop-menu-item ms-2"> My Account</span>
                                </DropdownLink>
                             </li>
                             <li>
                                <hr class="dropdown-divider">
                             </li>
                             <li>
                                <DropdownLink
                                    :href="route('passedaway.profile.bio')"
                                    as="a"
                                    class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                >
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1" y="1" width="22" height="22" rx="4" stroke="#000" stroke-width="2" />
                                    <path d="M4 12L10 18L20 6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="desktop-menu-item ms-2"> Remember Profile</span>
                                </DropdownLink>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                             <li>
                             <DropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="dropdown-item bg-danger-soft-hover desktop-menu-item reset-active-link-color d-flex"
                                >
                                <svg class="desktop-menu-item-icon" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 4L13.59 5.41L16.17 8H6V10H16.17L13.59 12.58L15 14L20 9L15 4ZM2 2H10V0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H10V16H2V2Z" fill="#272727"/>
                                </svg>
                                <span class="desktop-menu-item ms-2"> Log Out</span>

                            </DropdownLink>
                            </li>
                             <li>
                                <hr class="dropdown-divider">
                             </li>
                          </ul>
                       </li>
                    </ul>

                    <div class="gap-2 d-none d-sm-flex" v-else>
                        <a class="btn btn-register" :href="route('register')">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Register
                        </a>
                        <a class="btn btn-navy" :href="route('login')">
                            <i class="bi bi-person-fill"></i>
                            Sign In
                        </a>
                  </div>

                    <!-- Nav right END -->
                 </div>
              </nav>
              <!-- Logo Nav END -->
           </div>
        </header>


      <v-main>
        <v-container>
          <slot />
        </v-container>
      </v-main>
    </v-layout>
  </template>

  <script setup>
import DropdownLink from "@/Components/DropdownLink.vue";

  import { Link, usePage } from "@inertiajs/vue3";
  import { onMounted, ref } from "vue";
  components: {
    Link;
  }

  const drawer = ref(false);
  const logoUrl = window.location.origin + '/logo.png';
  const profileUrl = window.location.origin + '/profile.jpg';
  const items = ref([
    {
      title: "Foo",
      value: "foo",
    },
    {
      title: "Bar",
      value: "bar",
    },
    {
      title: "Fizz",
      value: "fizz",
    },
    {
      title: "Buzz",
      value: "buzz",
    },
  ]);

  onMounted(() => {
    drawer.value = false;
  });
  </script>


