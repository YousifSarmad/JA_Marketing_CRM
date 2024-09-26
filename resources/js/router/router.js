import { createRouter, createWebHistory } from 'vue-router';
import LeadsPage from './Pages/LeadsPage.vue';  // Add the path to your Vue files
import Contacts from './Pages/Contacts.vue';
import Pipeline from './Pages/Pipeline.vue';
import Calendar from './Pages/Calendar.vue';
import Messages from './Pages/Messages.vue';
import Profile from './Pages/Profile.vue';

const routes = [
  { path: '/leads', component: LeadsPage },
  { path: '/contacts', component: Contacts },
  { path: '/pipeline', component: Pipeline },
  { path: '/calendar', component: Calendar },
  { path: '/messages', component: Messages },
  { path: '/profile', component: Profile },
  { path: '/', redirect: '/leads' },  // Redirect to leads page by default
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
