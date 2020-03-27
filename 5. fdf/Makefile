# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/04/05 17:23:38 by jeagan            #+#    #+#              #
#    Updated: 2019/07/09 14:22:59 by jeagan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# **************************************************************************** #
#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT
#                             ____   ____    ____                              #
#                            ( ___) (  _ \  ( ___)                             #
#                             )__)   )(_) )  )__)                              #
#                            (__)   (____/  (__)                               #
#                    ____  ____    __    ___    __    _  _                     #
#                   (_  _)( ___)  /__\  / __)  /__\  ( \( )                    #
#                  .-_)(   )__)  /(__)\( (_-. /(__)\  )  (                     #
#                  \____) (____)(__)(__)\___/(__)(__)(_)\_)                    #
#																			   #
#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT#PROJECT
# **************************************************************************** #

# **************************************************************************** #
# AUTEUR                                                                       #
# **************************************************************************** #

AUTEUR	=	echo "$(USER)" > auteur

# **************************************************************************** #
# PROGRAM                                                                      #
# **************************************************************************** #

NAME		=	fdf
NAME_ONLY	=	$(basename $(NAME))
FILES		=	main\
				stock_pt\
				run_win\
				draw_win\
				draw_map\
				utils\
				key_use\
				clean

DPD			=	$(addprefix $(OBJ_PATH), $(FILES:=.d))

# **************************************************************************** #
# SOURCES                                                                      #
# **************************************************************************** #

SRC			=	$(FILES:=.c)
SRC_PATH	=	./srcs/
SRCS		=	$(addprefix $(SRC_PATH), $(SRC))

# **************************************************************************** #
# OBJECT                                                                       #
# **************************************************************************** #

OBJ			=	$(SRC:.c=.o)
OBJ_PATH	=	./objs/
OBJS		=	$(addprefix $(OBJ_PATH), $(OBJ))
OBJS_DIRS	=	$(sort $(dir $(OBJS)))

# **************************************************************************** #
# INCLUDES                                                                     #
# **************************************************************************** #

INC_PATH		=	./incs/
INCS_DIRS		=	$(addsuffix , $(INC_PATH))
INCS			=	$(addprefix -I , $(INCS_DIRS))

LIBFT			=	libft.a
LIBFT_PATH		=	./libft/
LIBFTS_DIRS		=	$(addsuffix , $(LIBFT_PATH))
LIBFTS			=	$(addprefix $(LIBFTS_DIRS), $(LIBFT))

INCLIB_PATH		=	$(addsuffix incs/, $(LIBFTS_DIRS))
INCLIBS_DIRS	=	$(addsuffix , $(INCLIB_PATH))
INCLIBS			=	$(addprefix -I , $(INCLIBS_DIRS))

MLX_PATH		=	/usr/local/lib

# **************************************************************************** #
# COLORS AND EFFECT                                                            #
# **************************************************************************** #

CE_NOCOLOR		=	\033[00m
CE_CLEAR		=	\033[2K
CE_UP 			=	\033[A
CE_BLACK		=	\033[30m
CE_RED			=	\033[31m
CE_GREEN		=	\033[32m
CE_YELLOW		=	\033[33m
CE_BLUE			=	\033[34m
CE_PURPLE		=	\033[35m
CE_CYAN			=	\033[36m
CE_WHITE		=	\033[37m
CE_SUR_BLACK	=	\033[40m
CE_SUR_RED		=	\033[41m
CE_SUR_GREEN	=	\033[42m
CE_SUR_YELLOW	=	\033[43m
CE_SUR_BLUE		=	\033[44m
CE_SUR_PURPLE	=	\033[45m
CE_SUR_CYAN		=	\033[46m
CE_SUR_WHITE	=	\033[47m
CE_GRAS			=	\033[1m
CE_SOUS			=	\033[4m

# **************************************************************************** #
# DBG MESSAGE                                                                  #
# **************************************************************************** #

MESS_ERROR		=	$(CE_RED)->ERROR<-$(CE_NOCOLOR)
MESS_WARNING	=	$(CE_YELLOW)->WARNING<-$(CE_NOCOLOR)
MESS_FAIL		=	$(CE_CYAN)->FAIL<-$(CE_NOCOLOR)
MESS_OK			=	$(CE_GREEN)... ->OK<-$(CE_NOCOLOR)
MESS_SUCCESS	=	$(CE_GREEN)->SUCCESS<-$(CE_NOCOLOR)
MESS_VALIDED	=	$(CE_GREEN)[ ✓ ]$(CE_NOCOLOR)
MESS_CURRENT	=	$(CE_CYAN)[ $@ ]$(CE_NOCOLOR)
MESS_COMPILED	=	$(CE_YELLOW)Compiled ==>>$(CE_NOCOLOR)
MESS_COMPIL		=	$(CE_YELLOW)-- Compiling$(CE_NOCOLOR)
MESS_ADD		=	$(CE_YELLOW)created ==>>$(CE_NOCOLOR)
MESS_DEL		=	$(CE_RED)==>> deleted$(CE_NOCOLOR)
MESS_NODEL		=	$(CE_CYAN)==>> nothing to delete$(CE_NOCOLOR)
MESS_NAME		=	$(CE_SUR_BLUE)$(CE_GRAS)$(CE_PURPLE)[ $(NAME_ONLY) ]$(CE_NOCOLOR)
MESS_ASSEMBLING	=	$(CE_GRAS)$(CE_YELLOW)Assembling ==>>$(CE_NOCOLOR)

# **************************************************************************** #
# PRINT                                                                        #
# **************************************************************************** #

ECHO_ASSEMBLING		=	$(MESS_NAME) $(MESS_ASSEMBLING) $(MESS_CURRENT) $(MESS_VALIDED)
ECHO_COMPILED		=	$(MESS_NAME) $(MESS_COMPILED) $(MESS_CURRENT) $(MESS_VALIDED)
ECHO_COMPIL			=	$(MESS_NAME) $(ACTUAL) / $(NBSRC) $(MESS_COMPIL) $(MESS_CURRENT) $(MESS_OK) $(CE_UP)	\
						$(eval ACTUAL=$(shell echo $$(($(ACTUAL) + 1))))
ECHO_OBJ_DIRECTORY	=	$(MESS_NAME) $(MESS_ADD) $(CE_BLUE)[ objs/ ] directory$(CE_NOCOLOR) $(MESS_SUCCESS)
ECHO_DELOBJ			=	$(MESS_NAME) $(CE_BLUE)[ OBJS.o ]$(CE_NOCOLOR) $(MESS_DEL) $(MESS_SUCCESS)
ECHO_NODELOBJ		=	$(MESS_NAME) $(CE_BLUE)[ OBJS.o ]$(CE_NOCOLOR) $(MESS_NODEL)
ECHO_DELALL			=	$(MESS_NAME) $(CE_CYAN)[ $(NAME) ]$(CE_NOCOLOR) $(MESS_DEL) $(MESS_SUCCESS)
ECHO_NODELALL		=	$(MESS_NAME) $(CE_CYAN)[ $(NAME) ]$(CE_NOCOLOR) $(MESS_NODEL)
ECHO_AUTEUR			=	$(CE_GREEN)=> AUTEUR CREATED <=$(CE_NOCOLOR)
ECHO_LOG			=	$(CE_SUR_BLACK)$(CE_GREEN)$(CE_GRAS)
ECHO_LOG2			=	$(CE_SUR_BLACK)$(CE_BLUE)$(CE_GRAS)

# **************************************************************************** #
# VAR INT                                                                      #
# **************************************************************************** #

NBSRC	=	$(words $(SRC))
ACTUAL	=	1

# **************************************************************************** #
# COMPILATION & ORDER                                                          #
# **************************************************************************** #

CC		=	clang
CFLAGS	=	-Wall -Wextra -Werror -MMD
ECHO	=	echo "$(CE_CLEAR)"
MKDIR	=	mkdir -p
RM		=	rm -f
RMR		=	rm -R
AR		=	ar rc
AR_RAN	=	$(AR)us
LDFLAGS	=	$(addprefix -L, $(LIBFT_PATH))
LDLIBS	=	-lft
MLXFLAGS=	-lmlx -framework OpenGL -framework AppKit
MLXLIBS	=	$(addprefix -L, $(MLX_PATH))

# **************************************************************************** #
# RULES                                                                        #
# **************************************************************************** #

opti:
	$(MAKE) all

all: auteur objs makelib $(NAME)

$(NAME): $(LIBFTS) $(OBJS)
	$(ECHO)"$(ECHO_LOG2)>>****************************************************************************<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                             ____   ____    ____                            $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                            ( ___) (  _ \  ( ___)                           $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                             )__)   )(_) )  )__)                            $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                            (__)   (____/  (__)                             $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	# $(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                    ____  ____    __    ___    __    _  _                   $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	# $(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                   (_  _)( ___)  /__\  / __)  /__\  ( \( )                  $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	# $(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                  .-_)(   )__)  /(__)\( (_-. /(__)\  )  (                   $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	# $(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                  \____) (____)(__)(__)\___/(__)(__)(_)\_)                  $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>$(ECHO_LOG)                                                                            $(ECHO_LOG2)<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_LOG2)>>****************************************************************************<<$(CE_NOCOLOR)"
	$(ECHO)"$(ECHO_ASSEMBLING)"
	$(CC) $(CFLAGS) $(MLXLIBS) $(MLXFLAGS) $(LDFLAGS) $(LDLIBS) $^ -o $@ $(INCS) $(INCLIBS)
	$(ECHO)"$(ECHO_COMPILED)"

auteur:
	$(AUTEUR)
	$(ECHO)"$(ECHO_AUTEUR)"

makelib:
	$(MAKE) all -C $(LIBFTS_DIRS)

objs:
	$(MKDIR) $(OBJS_DIRS)
	$(ECHO)"$(ECHO_OBJ_DIRECTORY)"

$(OBJ_PATH)%.o: $(SRC_PATH)%.c
	$(CC) $(CFLAGS) -o $@ -c $< $(INCS) $(INCLIBS)
	$(ECHO) "$(ECHO_COMPIL)"

clean:
	$(MAKE) clean -C $(LIBFTS_DIRS)
ifneq ("$(shell ls -R | grep main.o)","")
	$(RMR) $(OBJ_PATH)
	$(ECHO)"$(ECHO_DELOBJ)"
else
	$(ECHO)"$(ECHO_NODELOBJ)"
endif

fclean:		clean
	$(MAKE) fclean -C $(LIBFTS_DIRS)
ifneq ("$(shell ls -R | grep fdf)","")
	$(RM) $(NAME)
	$(ECHO)"$(ECHO_DELALL)"
else
	$(ECHO)"$(ECHO_NODELALL)"
endif

re:
	$(MAKE) fclean
	$(MAKE) all

# **************************************************************************** #
# PHONY                                                                        #
# **************************************************************************** #

.PHONY: all clean fclean re
.SILENT:

-include $(DPD)