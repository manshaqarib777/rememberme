<template>
    <div>
        <!-- Thumbnail Image -->
        <div @click="openPopup">
            <img
                :src="thumbnailUrl"
                alt="YouTube Video Thumbnail"
                class="cursor-pointer"
                style="min-height: 330px"
            />
            <div class="media-play-icon-container">
                <i class="bi bi-play-fill fs-3"></i>
            </div>
        </div>

        <!-- YouTube Video Popup Modal -->
        <div
            v-if="showPopup"
            :class="['grtyoutube-popup', themeClass]"
            @click="handleOutsideClick"
        >
            <div class="grtyoutube-popup-content" ref="popupContent">
                <iframe
                    class="grtyoutube-iframe"
                    :src="videoUrl"
                    allowfullscreen
                    frameborder="0"
                    allow="autoplay; fullscreen"
                ></iframe>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        videoLink: {
            type: String,
            required: true,
        },
        autoPlay: {
            type: Boolean,
            default: true,
        },
        theme: {
            type: String,
            default: "dark",
        },
    },
    data() {
        return {
            showPopup: false,
            videoID: null,
        };
    },
    computed: {
        themeClass() {
            return this.theme === "dark"
                ? "grtyoutube-dark-theme"
                : "grtyoutube-light-theme";
        },
        thumbnailUrl() {
            if (this.videoID) {
                return `https://i.ytimg.com/vi/${this.videoID}/hqdefault.jpg`;
            }
            return "";
        },
        videoUrl() {
            if (this.videoID) {
                return `https://www.youtube.com/embed/${
                    this.videoID
                }?rel=0&wmode=transparent&autoplay=${
                    this.autoPlay ? 1 : 0
                }&iv_load_policy=3`;
            }
            return "";
        },
    },
    methods: {
        extractVideoID() {
            const url = new URL(this.videoLink);
            this.videoID = url.searchParams.get("v");
            if (!this.videoID && url.hostname.includes("youtu.be")) {
                this.videoID = url.pathname.slice(1);
            }
        },
        openPopup() {
            this.showPopup = true;
        },
        closePopup() {
            this.showPopup = false;
        },
        handleOutsideClick(event) {
            if (!this.$refs.popupContent.contains(event.target)) {
                this.closePopup();
            }
        },
        handleEscapeKey(event) {
            if (event.keyCode === 27) {
                this.closePopup();
            }
        },
    },
    mounted() {
        this.extractVideoID();
        document.addEventListener("keyup", this.handleEscapeKey);
    },
    beforeUnmount() {
        document.removeEventListener("keyup", this.handleEscapeKey);
    },
};
</script>

<!-- <style scoped>
  .grtyoutube-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.75);
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .grtyoutube-popup-content {
    position: relative;
    background: #fff;
    padding: 20px;
    max-width: 800px;
    width: 90%;
    border-radius: 5px;
  }

  .grtyoutube-popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    cursor: pointer;
  }

  .grtyoutube-iframe {
    width: 100%;
    height: 450px;
    border: none;
  }

  .grtyoutube-dark-theme {
    background-color: #333;
    color: #fff;
  }

  .grtyoutube-light-theme {
    background-color: #fff;
    color: #333;
  }
  </style> -->
