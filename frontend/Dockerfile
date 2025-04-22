# Use a compatible Node.js runtime for Next.js
FROM node:23-alpine

# Create app directory
WORKDIR /usr/src/app

# Copy package manifests and install dependencies
COPY package*.json ./
RUN npm install

# Copy the rest of the application source code
COPY . .

# === Add this ===
# Define the public API base so Next.js can statically build
ENV NEXT_PUBLIC_API_BASE_URL=http://backend:8000/api

# Build the Next.js application
RUN npm run build

# Expose the port Next.js will run on
EXPOSE 3000

# Start Next.js in production mode
CMD ["npm", "run", "start"]