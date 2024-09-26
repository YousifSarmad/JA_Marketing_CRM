import { createRouter, createWebHistory } from 'vue-router';
import Layout from '../Layouts/Layout.vue'; // Correct path to Layout
import Dashboard from '../Pages/Dashboard.vue';
import Contacts from '../Pages/Contacts.vue';
import Pipeline from '../Pages/Pipeline.vue';
import Calendar from '../Pages/Calendar.vue';
import Messages from '../Pages/Messages.vue';
import Profile from '../Pages/Profile.vue';

const routes = [
  {
    path: '/',
    component: Layout,
    children: [
      { path: 'dashboard', component: Dashboard },
      { path: 'contacts', component: Contacts },
      { path: 'pipeline', component: Pipeline },
      { path: 'calendar', component: Calendar },
      { path: 'messages', component: Messages },
      { path: 'profile', component: Profile },
    ],
  },
  { path: '/', redirect: '/dashboard' }, // Redirect to dashboard as the default route
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
