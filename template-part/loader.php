<div class="spinner-section">
    <div class="spinner"></div>
</div>

<style>

.spinner-section {
    position: fixed;
    height: 100vh;
    background-color: #e9e6e685;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    z-index: 9999;
}

.spinner {
   width: 11.2px;
   height: 11.2px;
   border-radius: 11.2px;
   box-shadow: 28px 0px 0 0 rgba(71,75,255,0.2), 22.7px 16.5px 0 0 rgba(71,75,255,0.4), 8.68px 26.6px 0 0 rgba(71,75,255,0.6), -8.68px 26.6px 0 0 rgba(71,75,255,0.8), -22.7px 16.5px 0 0 #474bff;
   animation: spinner-b87k6z 1s infinite linear;
}

@keyframes spinner-b87k6z {
   to {
      transform: rotate(360deg);
   }
}
</style>