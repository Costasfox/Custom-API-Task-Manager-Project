/**
 * Tailwind CSS Configuration File
 *
 * This configuration customizes Tailwind's default settings for the project.
 * - Enables dark mode using the 'class' strategy.
 * - Extends the theme with custom colors for backgrounds and accents.
 */

tailwind.config = {
  // Enable dark mode via a CSS class (e.g., 'dark')
  darkMode: 'class',

  theme: {
    extend: {
      colors: {
        // Custom dark background color
        darkbg: '#18181b',

        // Custom dark card color
        darkcard: '#27272a',

        // Accent color for highlights and UI elements
        accent: '#6366f1',
      },
    },
  },
};
