<template>
  <div :class="['flex gap-2', vertical && 'flex-col']">
    <a
      v-for="platform in enabledPlatforms"
      :key="platform.name"
      :href="platform.url"
      target="_blank"
      rel="noopener noreferrer"
      :class="['flex items-center justify-center rounded-lg transition-colors', buttonClass, platform.class]"
      :style="{ backgroundColor: showColors ? platform.color : undefined }"
      :title="`Share on ${platform.label}`"
    >
      <span v-html="platform.icon" class="w-5 h-5"></span>
      <span v-if="showLabels" class="ml-2">{{ platform.label }}</span>
    </a>
  </div>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'LdShare',
  props: {
    url: { type: String, default: () => typeof window !== 'undefined' ? window.location.href : '' },
    title: { type: String, default: '' },
    text: { type: String, default: '' },
    platforms: { type: Array, default: () => ['twitter', 'facebook', 'linkedin', 'email'] },
    showLabels: { type: Boolean, default: false },
    showColors: { type: Boolean, default: true },
    vertical: { type: Boolean, default: false },
    buttonClass: { type: String, default: 'p-3 text-white hover:opacity-90' }
  },
  setup(props) {
    const allPlatforms = {
      twitter: {
        name: 'twitter',
        label: 'Twitter',
        color: '#1DA1F2',
        class: 'bg-[#1DA1F2]',
        icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
        getUrl: (url, title) => `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`
      },
      facebook: {
        name: 'facebook',
        label: 'Facebook',
        color: '#1877F2',
        class: 'bg-[#1877F2]',
        icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        getUrl: (url) => `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
      },
      linkedin: {
        name: 'linkedin',
        label: 'LinkedIn',
        color: '#0A66C2',
        class: 'bg-[#0A66C2]',
        icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
        getUrl: (url, title) => `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
      },
      email: {
        name: 'email',
        label: 'Email',
        color: '#6B7280',
        class: 'bg-gray-500',
        icon: '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
        getUrl: (url, title, text) => `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(text + '\n\n' + url)}`
      }
    };

    const enabledPlatforms = computed(() => {
      return props.platforms.map(p => {
        const platform = allPlatforms[p];
        if (!platform) return null;
        return { ...platform, url: platform.getUrl(props.url, props.title, props.text) };
      }).filter(Boolean);
    });

    return { enabledPlatforms };
  }
};
</script>
