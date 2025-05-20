<template>
  <header class="header">
    <nav class="nav">
      <router-link to="/" class="nav-link">Главная</router-link>
      <router-link to="/register" class="nav-link">Регистрация</router-link>
      <router-link to="/login" class="nav-link">Вход</router-link>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'HeaderComponent',
}
</script>

<style scoped lang="scss">
.header {
  background: #ffffff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 15px 30px;
  border-radius: 0 0 12px 12px;
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
}

.nav {
  display: flex;
  gap: 20px;
}

.nav-link {
  position: relative;
  text-decoration: none;
  font-size: 16px;
  color: #42b983;
  font-weight: 500;
  transition: color 0.3s;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: -3px;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #42b983;
  transition: width 0.3s ease;
}

.nav-link:hover {
  color: #2f4535;
  background-color: transparent !important; /* Убираем фоновый цвет */
}

.nav-link:hover::after {
  width: 100%;
}

</style>
