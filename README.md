MVP OOP Exercise
================

This is an OOP exercise meant to practise what you are able to do in three hours. No UI or database code is necessary.

This is a task to see how a programmer faces and solves a problem in a very limited amount of time. The main point is to see code structure, extendability, best OO practises such as SOLID, code easy to modify and be understood by others.

Sorting efficiency is also relevant.

Problem description
===================

Toucan Tournament is a tournament where several players compete in several sports. Right now, the sports played are basketball and handball games. They plan to add more sports in the future.

You have been contacted to create a program to calculate the Most Valuable Player (MVP) of the tournament.

You will receive a set of files, each one containing the stats of one game. Each file will start with a row indicating the sport it refers to.

Each player is assigned a unique nickname. 

Each file represents a single game.

The MVP is the player with the most rating points, adding the rating points in all games.

A player will receive 10 additional rating points if their team won the game. Every game must have a winner team. One player may play in different teams and positions in different games, but not in the same game.

The program responsible of generating the files has a bug, that can be reflected in wrong files format. If one file is wrong, the whole set of files is considered to be wrong and the MVP won't be calculated.

In Basketball, ech row will represent one player stats, with the format:

player name;nickname;number;team name;position;scored points;rebounds;assists

For scored point, rebound, and assist, Guard gets 2-3-1, Forward gets 2-2-2, and Center gets 2-1-3.

In Handball, each row will represent one player stats, with the format: 

player name;nickname;number;team name;position;goals made;goals received 

Goalkeeper has 50 initial rating points and gets 5 points per goal and -2 points per goal received, whereas Field Player has 20 initial rating points, gets 1 point per goal and -1 points per goal received.
