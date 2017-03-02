// Global Variables
// Clear all storage
localStorage.clear();
// Set game frame per seconds
var FPS = 144;
var TICKS = 1000/FPS;

var gameBlock = document.getElementById("game-block");
var controlBlock = document.getElementById("control-block");
var contextGame = gameBlock.getContext("2d");
var contextControl = controlBlock.getContext("2d");
document.body.appendChild(gameBlock);
var playerScore = highScore = 0;
var playerHealth = 5;
var playerBoom = 3;
var monsterSpeed = 1;
var monsterKilled = 0;
var numberMonster = 1;
var COUNT = 0;
var LEVEL = 1;
var booleanBoom = true;
var isRunning = true;
var isOver = false;
var isReady = false;
var allowPause = true;


// Check highscore
if (sessionStorage.getItem("highscore") == null) {
	sessionStorage.setItem("highscore",0);
} else {
	highScore = sessionStorage.getItem("highscore");
}


// Create Game background
var gameBackgorund = new Image();
gameBackgorund.onload = function() {
	isReady = true;
}
gameBackgorund.src = "Images/bg.jpg";

// Create Monster Image
var monsterImage = new Image();
monsterImage.onload = function() {

}
monsterImage.src = "Images/monster.png";

// Create Blood Image
var bloodImage = new Image();
bloodImage.src = "Images/blood.png";

// Create Boom Image
var boomImage = new Image();
boomImage.src = "Images/boom.gif";

// Create Pause Image
var pauseImage = new Image();
pauseImage.src = "Images/pause.png";

// Create Restart Image
var restartImage = new Image();
restartImage.src = "Images/restart.png";

// Create Heart Image
var heartImage = new Image();
heartImage.src = "Images/heart.png";

// Define Class
var Class = function(methods) {   
    var klass = function() {    
        this.initialize.apply(this, arguments);          
    };  
    
    for (var property in methods) { 
       klass.prototype[property] = methods[property];
    }
          
    if (!klass.prototype.initialize) klass.prototype.initialize = function(){};      
    
    return klass;    
};

// Create Monster Class
var MONSTER = Class ({
	initialize: function(beginX, beginY, endX, endY, startX, startY, stopX, stopY, speed, bClick, bShow, dieX, dieY) {
		this.beginX = beginX;
		this.beginY = beginY;
		this.endX = endX;
		this.endY = endY;
		this.startX = startX;
		this.startY = startY;
		this.stopX = stopX;
		this.stopY = stopY;
		this.speed = speed;
		this.bClick = bClick;
		this.bShow = bShow;
		this.dieX = dieX;
		this.dieY = dieY;
	}
});

// Create Monster
//monsterClass				   (beX , beY   , endX  , endY  , stX   , stY   , stopX , stopY , monsterSpeed, bCli, bSho , dX, dY)
var monsterOne   = 	new MONSTER(0	, 0		, 150	, 130	, 0		, 0		, 150	, 130	, monsterSpeed, true, true , 0 , 0);
var monsterTwo 	 = 	new MONSTER(0	, 150	, 150	, 150	, 0		, 150	, 150	, 150	, monsterSpeed, true, false, 0 , 0);
var monsterThree = 	new MONSTER(0	, 360	, 150	, 230	, 0		, 360	, 150	, 230	, monsterSpeed, true, false, 0 , 0);
var monsterFour  = 	new MONSTER(460	, 0		, 350	, 130	, 460	, 0		, 350	, 130	, monsterSpeed, true, false, 0 , 0);
var monsterFive  = 	new MONSTER(460	, 150	, 320	, 150	, 360	, 150	, 320	, 150	, monsterSpeed, true, false, 0 , 0);
var monsterSix 	 = 	new MONSTER(460	, 360	, 350	, 230	, 460	, 360	, 350	, 230	, monsterSpeed, true, false, 0 , 0);
var monsterSeven = 	new MONSTER(240	, 0		, 240	, 130	, 240	, 0		, 240	, 140	, monsterSpeed, true, false, 0 , 0);
var monsterEight = 	new MONSTER(240	, 360	, 240	, 180	, 240	, 210	, 240	, 180	, monsterSpeed, true, false, 0 , 0);
var monsterNine = 	new MONSTER(240	, 160	, 90	, 160	, 240	, 160	, 90	, 160	, monsterSpeed, true, false, 0 , 0);

/*
  Set animation for 8 corner monsters
  @param {monster} monster
*/
function monsterMove (monster) {
	// Set monster animation
	if (monster.startX > monster.stopX) {
		monster.startX -= monster.speed;
	} else if (monster.startX < monster.stopX) {
		monster.startX += monster.speed;
	}

	if (monster.startY > monster.stopY) {
		monster.startY -= monster.speed;
	} else if (monster.startY < monster.stopY) {
		monster.startY += monster.speed;
	}
	// If monster move to the stop position, set monster current position to the stop position
	if (monster.startX == monster.stopX && monster.startY == monster.stopY) {
		monster.startX = monster.stopX;
		monster.startY = monster.stopY;
		monster.stopX = monster.beginX;
		monster.stopY = monster.beginY;
	}
	// Move back to their first position
	if (monster.startX == monster.beginX && monster.startY == monster.beginY) {
		monster.bShow = false;
		monster.startX = monster.beginX;
		monster.startY = monster.beginY;
		monster.stopX = monster.endX;
		monster.stopY = monster.endY;
		playerScore -= 10;
		playerHealth--;
		randomMonster();
		if (playerHealth == 0) {
			isOver = true;
			isRunning = false;
		} 
	}
}

/*
  Set animation for 9th monster
  @param {monster} monster
*/
function ninethMonsterMove (monster) {
	// Same as monsterMove function
	if (monster.startX > monster.stopX) {
		monster.startX -= monster.speed;
	} else if (monster.startX < monster.stopX) {
		monster.startX += monster.speed;
	}

	if (monster.startY > monster.stopY) {
		monster.startY -= monster.speed;
	} else if (monster.startY < monster.stopY) {
		monster.startY += monster.speed;
	}
	// Same as monsterMove function
	if (monster.startX == monster.stopX && monster.startY == monster.stopY) {
		monster.startX = monster.stopX;
		monster.startY = monster.stopY;
		monster.stopX = monster.beginX;
		monster.stopY = monster.beginY;
	}
	/* Set monster position for each case to force it moves as we want
	   For case default: the monster finishs moves back to his first position,
	*/
	if (monster.startX == monster.beginX && monster.startY == monster.beginY) {
		switch(COUNT) {
			case 0:
				monster.startX = monster.beginX;
				monster.startY = monster.beginY;
				monster.stopX = 240;
				monster.stopY = 60;
				break;
			case 1:
				monster.startX = monster.beginX;
				monster.startY = monster.beginY;
				monster.stopX = 380;
				monster.stopY = 160
				break;
			case 2:
				monster.startX = monster.beginX;
				monster.startY = monster.beginY;
				monster.stopX = 240;
				monster.stopY = 290;
				break;
			default:
				monster.bShow = false;
				monster.startX = monster.beginX;
				monster.startY = monster.beginY;
				monster.stopX = monster.endX;
				monster.stopY = monster.endY;
				playerScore -= 10;
				playerHealth--;
				randomMonster();
				if (playerHealth == 0) {
					isOver = true;
					isRunning = false;
				} 
		}
		COUNT++;
	}
}
// Update monster position after each frame
function updateMonster() {
	if (monsterOne.bShow) {
		monsterMove(monsterOne);
	}
	if (monsterTwo.bShow) {
		monsterMove(monsterTwo);
	}
	if (monsterThree.bShow) {
		monsterMove(monsterThree);
	}
	if (monsterFour.bShow) {
		monsterMove(monsterFour);
	}
	if (monsterFive.bShow) {
		monsterMove(monsterFive);
	}
	if (monsterSix.bShow) {
		monsterMove(monsterSix);
	}
	if (monsterSeven.bShow) {
		monsterMove(monsterSeven);
	}
	if (monsterEight.bShow) {
		monsterMove(monsterEight);
	}
	if (monsterNine.bShow) {
		ninethMonsterMove(monsterNine);
	}
}
// Set monster position to their first position
function refreshMonster(monster) {
	monster.bShow = false;
	monster.startX = monster.beginX;
	monster.startY = monster.beginY;
	monster.stopX = monster.endX;
	monster.stopY = monster.endY;
	monster.speed = monsterSpeed;
}
// Random the monster to show on the game screen
function randomMonster() {
	if (!monsterOne.bShow) {
		refreshMonster(monsterOne);
	}
	if (!monsterTwo.bShow) {
		refreshMonster(monsterTwo);
	}
	if (!monsterThree.bShow) {
		refreshMonster(monsterThree);
	}
	if (!monsterFour.bShow) {
		refreshMonster(monsterFour);
	}
	if (!monsterFive.bShow) {
		refreshMonster(monsterFive);
	}
	if (!monsterSix.bShow) {
		refreshMonster(monsterSix);
	}
	if (!monsterSeven.bShow) {
		refreshMonster(monsterSeven);
	}
	if (!monsterEight.bShow) {
		refreshMonster(monsterEight);
	}
	if (!monsterNine.bShow) {
		refreshMonster(monsterNine);
	}
	var value = Math.floor((Math.random() * 9) + 1);
	switch(value) {
		case 1:
		if (!monsterOne.bShow) {
			monsterOne.bShow = true;
		}
		break;
		case 2:
		if (!monsterTwo.bShow) {
			monsterTwo.bShow = true;
		}
		break;
		case 3:
		if (!monsterThree.bShow) {
			monsterThree.bShow = true;
		}
		break;
		case 4:
		if (!monsterFour.bShow) {
			monsterFour.bShow = true;
		}
		break;
		case 5:
		if (!monsterFive.bShow) {
			monsterFive.bShow = true;
		}
		break;
		case 6:
		if (!monsterSix.bShow) {
			monsterSix.bShow = true;
		}
		break;
		case 7:
		if (!monsterSeven.bShow) {
			monsterSeven.bShow = true;
		}
		break;
		case 8:
		if (!monsterEight.bShow) {
			monsterEight.bShow = true;
		}
		break;
		case 9:
		if (!monsterNine.bShow) {
			monsterNine.bShow = true;
			COUNT = 0;
		}
		break;
	}
}

// Draw game background, game button, game monster and player status
function gameRender() {

	// Player Info
	contextControl.clearRect(0, 0, controlBlock.width, controlBlock.height);
	contextControl.font = "25px Arial";
	contextControl.fillStyle = "red";
	contextControl.fillText("Health: ", 10, 30);
	contextControl.fillText("High score: " + highScore, 370, 30);
	contextControl.fillText("Kill: " + monsterKilled, 370, 60);
	contextControl.fillText("Score: " + playerScore, 10, 60);
	var tempPos = 0;
	for (i = 0; i < playerHealth; i++) {
		contextControl.drawImage(heartImage, (100+tempPos), 10, 25, 25);
		tempPos += 25;
	}
	// Boom Button
	contextControl.drawImage(boomImage, 100, 70, 70, 70);
	contextControl.font = "40px Arial";
	contextControl.fillStyle = "white";
	contextControl.fillText(playerBoom, 175, 120);

	// Pause Button
	contextControl.drawImage(pauseImage, 290, 80, 50, 50);

	// Restart Button
	contextControl.drawImage(restartImage, 450, 80, 50, 50);

	// Play Screen
	if (isReady) {
		contextGame.drawImage(gameBackgorund, 0, 0, gameBlock.width, gameBlock.height);
	}
	
	if (monsterOne.bShow) {
		contextGame.drawImage(monsterImage, monsterOne.startX, monsterOne.startY);
	}
	if (monsterTwo.bShow) {
		contextGame.drawImage(monsterImage, monsterTwo.startX, monsterTwo.startY);
	} 
	if (monsterThree.bShow) {
		contextGame.drawImage(monsterImage, monsterThree.startX, monsterThree.startY);
	} 
	if (monsterFour.bShow) {
		contextGame.drawImage(monsterImage, monsterFour.startX, monsterFour.startY);
	} 
	if (monsterFive.bShow) {
		contextGame.drawImage(monsterImage, monsterFive.startX, monsterFive.startY);
	} 
	if (monsterSix.bShow) {
		contextGame.drawImage(monsterImage, monsterSix.startX, monsterSix.startY);
	} 
	if (monsterSeven.bShow) {
		contextGame.drawImage(monsterImage, monsterSeven.startX, monsterSeven.startY);
	} 
	if (monsterEight.bShow) {
		contextGame.drawImage(monsterImage, monsterEight.startX, monsterEight.startY);
	} 
	if (monsterNine.bShow) {
		contextGame.drawImage(monsterImage, monsterNine.startX, monsterNine.startY);
	} 
}


// Create click event for control block: Boom button, Pause button, Restart button
controlBlock.addEventListener("click", function(event) {
	// Get user's mouse position
	var posX = event.pageX - this.offsetLeft;
	var posY = event.pageY - this.offsetTop;

	// Boom Button
	if (posX > 110 && posX < 160 && posY > 75 && posY < 125) {
		if (booleanBoom && isRunning) {
			boomToKill();
			playerBoom--;
			console.log("Boom");
			if (playerBoom == 0) {
				booleanBoom = false;
			}
		}
	}

	// Pause Button
	if (posX > 290 && posX < 335 && posY > 80 && posY < 125) {
		if (isRunning && allowPause) {
			isRunning = false;
		} else if (!isRunning && allowPause) {
			isRunning = true;
			MAIN();
		}
	}

	// Restart Button
	if (posX > 405 && posX < 495 && posY > 80 && posY < 125) {
		contextGame.clearRect(0, 0, gameBlock.width, gameBlock.height);
		restartGame();
	}

});

// Create click event for gameplay block
gameBlock.addEventListener("click", function(event) {
	// Get user's mouse postion
	var posX = event.pageX - this.offsetLeft;
	var posY = event.pageY - this.offsetTop;
	if (isRunning) {
		playerScore -= 10;
		if (monsterOne.bShow) {
			clickToKill(monsterOne, posX, posY);
		}

		if (monsterTwo.bShow) {
			clickToKill(monsterTwo, posX, posY);
		}

		if (monsterThree.bShow) {
			clickToKill(monsterThree, posX, posY);
		}

		if (monsterFour.bShow) {
			clickToKill(monsterFour, posX, posY);
		}

		if (monsterFive.bShow) {
			clickToKill(monsterFive, posX, posY);
		}

		if (monsterSix.bShow) {
			clickToKill(monsterSix, posX, posY);
		}

		if (monsterSeven.bShow) {
			clickToKill(monsterSeven, posX, posY);
		}

		if (monsterEight.bShow) {
			clickToKill(monsterEight, posX, posY);
		}

		if (monsterNine.bShow) {
			clickToKill(monsterNine, posX, posY);
		}
	}
});

/*
 Click the monster and kill him.
 @param {monster} monster
 @param {number}  posX 		X position of user's mouse 
 @param {number}  posY 		Y position of user's mouse 
*/
function clickToKill(monster, posX, posY) {
	if (monster.startX < posX && posX < (monster.startX + monsterImage.width) && monster.startY < posY && posY < (monster.startY + monsterImage.height)) {
		playerScore += 20;
		monsterKilled++;
		refreshMonster(monster);
		monster.bClick = false;
		monster.dieX = monster.startX;
		monster.dieY = monster.startY;
		for (var i = 0; i < numberMonster; i++) {
			randomMonster();
		}
		addPlayerStatus();
	} 
}
/*
 Click boom button and kill all the monster in gameplay.
 @param {monster} monster
*/
var boomToKill = function(monster) {
	if (monsterOne.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterOne.bShow = false;
		monsterOne.bClick = false;
		addPlayerStatus();
	}

	if (monsterTwo.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterTwo.bShow = false;
		monsterTwo.bClick = false;
		addPlayerStatus();
	}

	if (monsterThree.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterThree.bShow = false;
		monsterThree.bClick = false;
		addPlayerStatus();
	}

	if (monsterFour.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterFour.bShow = false;
		monsterFour.bClick = false;
		addPlayerStatus();
	}

	if (monsterFive.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterFive.bShow = false;
		monsterFive.bClick = false;
		addPlayerStatus();
	}

	if (monsterSix.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterSix.bShow = false;
		monsterSix.bClick = false;
		addPlayerStatus();
	}

	if (monsterSeven.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterSeven.bShow = false;
		monsterSeven.bClick = false;
		addPlayerStatus();
	}

	if (monsterEight.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterEight.bShow = false;
		monsterEight.bClick = false;
		addPlayerStatus();
	}

	if (monsterNine.bShow) {
		playerScore += 10;
		monsterKilled++;
		monsterNine.bShow = false;
		monsterNine.bClick = false;
		addPlayerStatus();
	}
	// Call back to draw new monster after kill them all
	gameRender();
	for (var i = 0; i < numberMonster; i++) {
		randomMonster();
	}
}
// Set game level depends on player's score
function setLevel() {
	var tempKill = monsterKilled / 10;
	switch (parseInt(tempKill)) {
		case 1:
		monsterSpeed = 1;
		numberMonster = 1;
		break;
		case 2:
		monsterSpeed = 1;
		numberMonster = 2;
		break;
		case 3:
		monsterSpeed = 2;
		numberMonster = 3;
		break;
		case 4:
		monsterSpeed = 2;
		numberMonster = 4;
		break;
		case 5:
		monsterSpeed = 5;
		numberMonster = 5;
		break;
		case 6:
		monsterSpeed = 10;
		numberMonster = 6;
		break;
	}
}
// Add player health and boom for each level of player score
function addPlayerStatus() {
	if (playerHealth < 10) {
		if (playerScore == 100) {
			playerHealth += 1;
		} 
		if (playerScore == 200) {
			playerHealth += 1;
		}
		if (playerScore == 300) {
			playerHealth += 1;
		} 
		if (playerScore == 400) {
			playerHealth += 2;
		} 
		if (playerScore == 500) {
			playerHealth += 2;
		}
		if (playerScore == 600) {
			playerHealth += 3;
		}
	}

	if (playerBoom < 5) {
		if (playerHealth == 4) {
			playerBoom += 1;
		} 
		if (playerHealth == 3) {
			playerBoom += 2;
		}
		if (playerHealth == 2) {
			playerBoom += 3;
		} 
		if (playerHealth == 1) {
			playerBoom += 4;
		} 
	}
}

// Restart game, set all variables to their original value.
function restartGame () {
	playerScore = 0;
	playerHealth = 5;
	playerBoom = 3;
    monsterSpeed = 1;
    monsterKilled = 0;
	numberMonster = 1;
	COUNT = 0;
	LEVEL = 1;
	booleanBoom = true;
	isRunning = true;
	isOver = false;
	isReady = true;
	allowPause = true;
	refreshMonster(monsterOne);
	monsterOne.bShow = true;
	refreshMonster(monsterTwo);
	refreshMonster(monsterThree);
	refreshMonster(monsterFour);
	refreshMonster(monsterFive);
	refreshMonster(monsterSix);
	refreshMonster(monsterSeven);
	refreshMonster(monsterEight);
	refreshMonster(monsterNine);
	// Get high score and set it
	if (sessionStorage.getItem("highscore") == null) {
		sessionStorage.setItem("highscore",0);
	} else {
		highScore = sessionStorage.getItem("highscore");
	}
	MAIN();
}

function MAIN() {
	/*
	  These code make our game play smoother, fixed the error when we click restart button many times
	*/
	var NOW = Date.now();
	var differentTime = NOW - lastUpdateTime;
	if(differentTime >= TICKS) {
		setLevel();
		updateMonster();
		gameRender();
		lastUpdateTime = NOW;
	}
	var sleepTime = TICKS - differentTime;
	if(sleepTime < 0) {
		sleepTime = 0;
	}
	// Game is running
	if (isRunning && !isOver) {
		requestAnimationFrame(MAIN);
		
	 } else if (!isRunning && isOver) { // Game end
		contextGame.clearRect(0, 0, gameBlock.width, gameBlock.height);
		contextGame.drawImage(gameBackgorund, 0, 0, gameBlock.width, gameBlock.height);
		contextGame.font = "40px Arial";
		contextGame.fillStyle = "white";
		contextGame.fillText("GAME OVER",180, 230);
		contextGame.font = "25px Arial";
		contextGame.fillText("High score: " + highScore ,215, 260);
		contextGame.fillText("Your score: " + playerScore ,215, 290);
		if (playerScore > highScore) {
			sessionStorage.setItem("highscore", playerScore);
		}
		// Disable pause button when game over
		allowPause = false;
	}
}
var windows = window;
requestAnimationFrame = windows.requestAnimationFrame || windows.webkitRequestAnimationFrame 
|| windows.msRequestAnimationFrame || windows.mozRequestAnimationFrame;
var lastUpdateTime = Date.now();
MAIN();