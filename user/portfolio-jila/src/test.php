<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<body>
    <div id="tech-stack"></div>

    <script>
        async function fetchRepoTechStack(mohmmadashif1001) {
            try {
                const response = await fetch(`https://api.github.com/users/${mohmmadashif1001}/repos`);
                const repos = await response.json();

                const techStack = new Set();

                for (const repo of repos) {
                    const languagesResponse = await fetch(repo.languages_url);
                    const languagesData = await languagesResponse.json();
                    const languages = Object.keys(languagesData);
                    languages.forEach(language => techStack.add(language));
                }

                return Array.from(techStack);
            } catch (error) {
                console.error('Error fetching repository data:', error);
                return [];
            }
        }

        async function displayTechStack() {
            const username = 'mohmmadashif1001'; // Replace 'yourusername' with your GitHub username
            const techStack = await fetchRepoTechStack(mohmmadashif1001);

            const techStackContainer = document.getElementById('tech-stack');

            techStack.forEach(tech => {
                const badgeUrl = `https://img.shields.io/badge/${encodeURIComponent(tech)}-%23${generateRandomColor()}?style=plastic&logo=${encodeURIComponent(tech)}&logoColor=white`;
                const badgeImage = document.createElement('img');
                badgeImage.src = badgeUrl;
                badgeImage.alt = tech;
                techStackContainer.appendChild(badgeImage);
            });
        }

        // Generate a random color for badge backgrounds
        function generateRandomColor() {
            return Math.floor(Math.random()*16777215).toString(16);
        }

        displayTechStack();
    </script>
</body>
</html>
