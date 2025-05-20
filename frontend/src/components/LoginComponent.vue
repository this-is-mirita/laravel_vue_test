<!-- src/components/LoginComponent.vue -->
<template>
  <div class="login-page">
    <div class="login-form">
      <h2>Вход</h2>

      <div class="input__item">
        <input class="input-2" type="email" placeholder="Введите email" />
        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z" stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </div>

      <div class="input__item">
        <input class="input-2" type="password" placeholder="Введите пароль" />
        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z" stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </div>

      <button class="submit-btn">Войти</button>
    </div>
  </div>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
  name: 'LoginComponent',
  components: { HeaderComponent },
}
</script>

<style scoped lang="scss">
.login-page {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 50vh;
}

.login-form {
  background: #ffffff;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  min-width: 600px;

  h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
  }
}

.input__item {
  position: relative;
  margin-bottom: 20px;

  svg {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
  }
}

.input-2 {
  width: 100%;
  padding: 10px 40px 10px 15px;
  height: 45px;
  font-size: 16px;
  color: #333;
  border-radius: 6px;
  border: 1px solid #ccc;
  background-color: #f9f9f9;

  &::placeholder {
    color: #aaa;
  }
}

.submit-btn {
  width: 100%;
  padding: 12px;
  background-color: #42b983;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;

  &:hover {
    background-color: #3a513f;
  }
}
</style>
